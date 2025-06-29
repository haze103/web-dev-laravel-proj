use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Define a list of roles to be created in the system
        $roles = ['Super Admin', 'Admin', 'Sales Manager', 'Sales Representative'];

        // Loop through each role and create it if it doesn't already exist
        foreach ($roles as $roleName) {
            Role::firstOrCreate(['name' => $roleName]);
        }

        // Go through every user in the database
        User::all()->each(function ($user) {
            // If the user has a 'role' attribute, assign the corresponding role
            if ($user->role) {
                $user->assignRole($user->role);
            }
        });
    }
}
