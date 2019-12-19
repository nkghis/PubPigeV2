<?php

use App\Permission;
use App\User;
Use App\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call([UsersTableSeeder::class]);
        // Demande avant db migration refresh, valeur par defaut est no
        if ($this->command->confirm('Voulez vous effectuer un refresh migration avant seeding, il supprimera toutes les anciennes données ?')) {
            // Appel de la commande php artisan migrate:refresh
            $this->command->call('migrate:refresh');
            $this->command->warn("Données éffacées, Base de données vierge.");
        }
        // Seed  permissions par défaut
        $permissions = Permission::defaultPermissions();
        foreach ($permissions as $perms) {
            Permission::firstOrCreate(['name' => $perms]);
        }
        $this->command->info('Permissions par défaut ajoutées.');
        // Confirmer l'ajout de rôles
        if ($this->command->confirm('Creation Roles pour user, par défaut  admin et user? [y|N]', true)) {
            // demande des roles à entrer
            $input_roles = $this->command->ask('Entrer roles avec une virgule pour les separer format à respecter.', 'Admin,User');
            // fractionner les rôles
            $roles_array = explode(',', $input_roles);
            // ajouter rôles
            foreach($roles_array as $role) {
                $role = Role::firstOrCreate(['name' => trim($role)]);
                if( $role->name == 'Admin' ) {
                    // assignation Toutes les permissions
                    $role->syncPermissions(Permission::all());
                    $this->command->info('toutes les autorisations ont été accordées à Admin');
                } else {
                    // Pour les autres par défaut Accès lecture seule
                    $role->syncPermissions(Permission::where('name', 'LIKE', 'view_%')->get());
                }
                // creation un utilisateur pour chaque role
                $this->createUser($role);
            }
            $this->command->info('Roles ' . $input_roles . ' Ajouté avec succes');
        } else {
            Role::firstOrCreate(['name' => 'User']);
            $this->command->info('Ajouté seulement le role user par défaut.');
        }
        /**
         * Creation d'un Post pour seeder à ajouter a chaque fois qu une table est ajouté
         *
         *
         */
        // now lets seed some posts for demo
        /*factory(\App\Post::class, 30)->create();
        $this->command->info('Toutes les données Posts ont été ajoutées.');
        $this->command->warn('Fait :)');*/
    }
    /**
     * Creation a utilisateur avec assignation de rôle.
     *
     * @param $role
     */
    private function createUser($role)
    {
        $user = factory(User::class)->create();
        $user->assignRole($role->name);
        if( $role->name == 'Admin' ) {
            $this->command->info('Ci-dessous les détails de connexion de Admin :');
            $this->command->warn($user->email);
            $this->command->warn('Le mot de passe est "secret"');
        }

    }
}
