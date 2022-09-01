<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create Permission permissions
        Permission::create(['name' => 'view permissions',    'guard_name' => 'web']);
        Permission::create(['name' => 'viewAny permissions', 'guard_name' => 'web']);
        Permission::create(['name' => 'create permissions',  'guard_name' => 'web']);
        Permission::create(['name' => 'edit permissions',    'guard_name' => 'web']);
        Permission::create(['name' => 'delete permissions',  'guard_name' => 'web']);

        // create Role permissions
        Permission::create(['name' => 'view roles',     'guard_name' => 'web']);
        Permission::create(['name' => 'viewAny roles',  'guard_name' => 'web']);
        Permission::create(['name' => 'create roles',   'guard_name' => 'web']);
        Permission::create(['name' => 'edit roles',     'guard_name' => 'web']);
        Permission::create(['name' => 'delete roles',   'guard_name' => 'web']);

        // create Student permissions
        Permission::create(['name' => 'view students',    'guard_name' => 'web']);
        Permission::create(['name' => 'viewAny students', 'guard_name' => 'web']);
        Permission::create(['name' => 'create students',  'guard_name' => 'web']);
        Permission::create(['name' => 'edit students',    'guard_name' => 'web']);
        Permission::create(['name' => 'delete students',  'guard_name' => 'web']);

        // create User permissions
        Permission::create(['name' => 'view users',   'guard_name' => 'web']);
        Permission::create(['name' => 'viewAny users', 'guard_name' => 'web']);
        Permission::create(['name' => 'create users', 'guard_name' => 'web']);
        Permission::create(['name' => 'edit users',   'guard_name' => 'web']);
        Permission::create(['name' => 'delete users', 'guard_name' => 'web']);

        // create Workflow permissions
        Permission::create(['name' => 'view workflows',   'guard_name' => 'web']);
        Permission::create(['name' => 'viewAny workflows', 'guard_name' => 'web']);
        Permission::create(['name' => 'create workflows', 'guard_name' => 'web']);
        Permission::create(['name' => 'edit workflows',   'guard_name' => 'web']);
        Permission::create(['name' => 'delete workflows', 'guard_name' => 'web']);

        // create Billing Permissions
        Permission::create(['name' => 'view billings',   'guard_name' => 'web']);
        Permission::create(['name' => 'viewAny billings', 'guard_name' => 'web']);
        Permission::create(['name' => 'create billings', 'guard_name' => 'web']);
        Permission::create(['name' => 'edit billings',   'guard_name' => 'web']);
        Permission::create(['name' => 'delete billings', 'guard_name' => 'web']);

        // create Category Permissions
        Permission::create(['name' => 'view categories',   'guard_name' => 'web']);
        Permission::create(['name' => 'viewAny categories', 'guard_name' => 'web']);
        Permission::create(['name' => 'create categories', 'guard_name' => 'web']);
        Permission::create(['name' => 'edit categories',   'guard_name' => 'web']);
        Permission::create(['name' => 'delete categories', 'guard_name' => 'web']);

        // create Doctor Master Permissions
        Permission::create(['name' => 'view doctor_masters',   'guard_name' => 'web']);
        Permission::create(['name' => 'viewAny doctor_masters', 'guard_name' => 'web']);
        Permission::create(['name' => 'create doctor_masters', 'guard_name' => 'web']);
        Permission::create(['name' => 'edit doctor_masters',   'guard_name' => 'web']);
        Permission::create(['name' => 'delete doctor_masters', 'guard_name' => 'web']);

        // create Head Quarter Permissions
        Permission::create(['name' => 'view head_quarters',   'guard_name' => 'web']);
        Permission::create(['name' => 'viewAny head_quarters', 'guard_name' => 'web']);
        Permission::create(['name' => 'create head_quarters', 'guard_name' => 'web']);
        Permission::create(['name' => 'edit head_quarters',   'guard_name' => 'web']);
        Permission::create(['name' => 'delete head_quarters', 'guard_name' => 'web']);

        // create Item Type Permissions
        Permission::create(['name' => 'view item_types',   'guard_name' => 'web']);
        Permission::create(['name' => 'viewAny item_types', 'guard_name' => 'web']);
        Permission::create(['name' => 'create item_types', 'guard_name' => 'web']);
        Permission::create(['name' => 'edit item_types',   'guard_name' => 'web']);
        Permission::create(['name' => 'delete item_types', 'guard_name' => 'web']);

        // create Patch Permissions
        Permission::create(['name' => 'view patches',   'guard_name' => 'web']);
        Permission::create(['name' => 'viewAny patches', 'guard_name' => 'web']);
        Permission::create(['name' => 'create patches', 'guard_name' => 'web']);
        Permission::create(['name' => 'edit patches',   'guard_name' => 'web']);
        Permission::create(['name' => 'delete patches', 'guard_name' => 'web']);

        // create Product Master Permissions
        Permission::create(['name' => 'view product_masters',   'guard_name' => 'web']);
        Permission::create(['name' => 'viewAny product_masters', 'guard_name' => 'web']);
        Permission::create(['name' => 'create product_masters', 'guard_name' => 'web']);
        Permission::create(['name' => 'edit product_masters',   'guard_name' => 'web']);
        Permission::create(['name' => 'delete product_masters', 'guard_name' => 'web']);

        // create Product Permissions
        Permission::create(['name' => 'view products',   'guard_name' => 'web']);
        Permission::create(['name' => 'viewAny products', 'guard_name' => 'web']);
        Permission::create(['name' => 'create products', 'guard_name' => 'web']);
        Permission::create(['name' => 'edit products',   'guard_name' => 'web']);
        Permission::create(['name' => 'delete products', 'guard_name' => 'web']);

        // create Product Sale Permissions
        Permission::create(['name' => 'view product_sales',   'guard_name' => 'web']);
        Permission::create(['name' => 'viewAny product_sales', 'guard_name' => 'web']);
        Permission::create(['name' => 'create product_sales', 'guard_name' => 'web']);
        Permission::create(['name' => 'edit product_sales',   'guard_name' => 'web']);
        Permission::create(['name' => 'delete product_sales', 'guard_name' => 'web']);

        // create Sales Manager Permissions
        Permission::create(['name' => 'view sales_managers',   'guard_name' => 'web']);
        Permission::create(['name' => 'viewAny sales_managers', 'guard_name' => 'web']);
        Permission::create(['name' => 'create sales_managers', 'guard_name' => 'web']);
        Permission::create(['name' => 'edit sales_managers',   'guard_name' => 'web']);
        Permission::create(['name' => 'delete sales_managers', 'guard_name' => 'web']);

        // create State Permissions
        Permission::create(['name' => 'view states',   'guard_name' => 'web']);
        Permission::create(['name' => 'viewAny states', 'guard_name' => 'web']);
        Permission::create(['name' => 'create states', 'guard_name' => 'web']);
        Permission::create(['name' => 'edit states',   'guard_name' => 'web']);
        Permission::create(['name' => 'delete states', 'guard_name' => 'web']);

        // create Stockist Permissions
        Permission::create(['name' => 'view stockists',   'guard_name' => 'web']);
        Permission::create(['name' => 'viewAny stockists', 'guard_name' => 'web']);
        Permission::create(['name' => 'create stockists', 'guard_name' => 'web']);
        Permission::create(['name' => 'edit stockists',   'guard_name' => 'web']);
        Permission::create(['name' => 'delete stockists', 'guard_name' => 'web']);

        // create Free Unit Permissions
        Permission::create(['name' => 'view free_units',   'guard_name'  => 'web']);
        Permission::create(['name' => 'viewAny free_units', 'guard_name' => 'web']);
        Permission::create(['name' => 'create free_units', 'guard_name'  => 'web']);
        Permission::create(['name' => 'edit free_units',   'guard_name'  => 'web']);
        Permission::create(['name' => 'delete free_units', 'guard_name'  => 'web']);

        // create Area Manager Permissions
        Permission::create(['name' => 'view area_managers',   'guard_name'  => 'web']);
        Permission::create(['name' => 'viewAny area_managers', 'guard_name' => 'web']);
        Permission::create(['name' => 'create area_managers', 'guard_name'  => 'web']);
        Permission::create(['name' => 'edit area_managers',   'guard_name'  => 'web']);
        Permission::create(['name' => 'delete area_managers', 'guard_name'  => 'web']);

        // create Specialist Permissions
        Permission::create(['name' => 'view specialists',   'guard_name'  => 'web']);
        Permission::create(['name' => 'viewAny specialists', 'guard_name' => 'web']);
        Permission::create(['name' => 'create specialists', 'guard_name'  => 'web']);
        Permission::create(['name' => 'edit specialists',   'guard_name'  => 'web']);
        Permission::create(['name' => 'delete specialists', 'guard_name'  => 'web']);

        // create Distribution Method Permissions
        Permission::create(['name' => 'view distribution_methods',   'guard_name'  => 'web']);
        Permission::create(['name' => 'viewAny distribution_methods', 'guard_name' => 'web']);
        Permission::create(['name' => 'create distribution_methods', 'guard_name'  => 'web']);
        Permission::create(['name' => 'edit distribution_methods',   'guard_name'  => 'web']);
        Permission::create(['name' => 'delete distribution_methods', 'guard_name'  => 'web']);

        // create Prescription Permissions
        Permission::create(['name' => 'view prescriptions',   'guard_name'  => 'web']);
        Permission::create(['name' => 'viewAny prescriptions', 'guard_name' => 'web']);
        Permission::create(['name' => 'create prescriptions', 'guard_name'  => 'web']);
        Permission::create(['name' => 'edit prescriptions',   'guard_name'  => 'web']);
        Permission::create(['name' => 'delete prescriptions', 'guard_name'  => 'web']);

        // create Product Target Permissions
        Permission::create(['name' => 'view product_targets',   'guard_name'  => 'web']);
        Permission::create(['name' => 'viewAny product_targets', 'guard_name' => 'web']);
        Permission::create(['name' => 'create product_targets', 'guard_name'  => 'web']);
        Permission::create(['name' => 'edit product_targets',   'guard_name'  => 'web']);
        Permission::create(['name' => 'delete product_targets', 'guard_name'  => 'web']);

        // create Sales Manager Target Permissions
        Permission::create(['name' => 'view sales_manager_targets',   'guard_name'  => 'web']);
        Permission::create(['name' => 'viewAny sales_manager_targets', 'guard_name' => 'web']);
        Permission::create(['name' => 'create sales_manager_targets', 'guard_name'  => 'web']);
        Permission::create(['name' => 'edit sales_manager_targets',   'guard_name'  => 'web']);
        Permission::create(['name' => 'delete sales_manager_targets', 'guard_name'  => 'web']);

        // create User User with default permissions
        $userrole = Role::create(['name' => 'User User']);
        $userrole->givePermissionTo(['view users', 'viewAny users', 'create users']);
        $this->command->info('Roles and Permissions granted to User User');

        // create User Manager role with default permissions
        $managerrole = Role::create(['name' => 'User Manager']);
        $managerrole->givePermissionTo(['view users', 'viewAny users', 'create users', 'edit users']);
        $this->command->info('Roles and Permissions granted to User Manager');

        // create User Admin with default permissions
        $adminrole = Role::create(['name' => 'User Admin']);
        $adminrole->givePermissionTo(['view users', 'viewAny users', 'create users', 'edit users', 'delete users']);
        $this->command->info('Roles and Permissions granted to User Admin');

        // create Student User with default permissions
        $userrole = Role::create(['name' => 'Student User']);
        $userrole->givePermissionTo(['view students', 'viewAny students', 'create students']);
        $this->command->info('Roles and Permissions granted to Student User');

        // create Student Manager role with default permissions
        $managerrole = Role::create(['name' => 'Student Manager']);
        $managerrole->givePermissionTo(['view students', 'viewAny students', 'create students', 'edit students']);
        $this->command->info('Roles and Permissions granted to Student Manager');

        // create Student Admin with default permissions
        $adminrole = Role::create(['name' => 'Student Admin']);
        $adminrole->givePermissionTo(['view students', 'viewAny students', 'create students', 'edit students', 'delete students']);
        $this->command->info('Roles and Permissions granted to Student Admin');

        // create Role User with default permissions
        $userrole = Role::create(['name' => 'Role User']);
        $userrole->givePermissionTo(['view roles', 'viewAny roles', 'create roles']);
        $this->command->info('Roles and Permissions granted to Role User');

        // create Role Manager role with default permissions
        $managerrole = Role::create(['name' => 'Role Manager']);
        $managerrole->givePermissionTo(['view roles', 'viewAny roles', 'create roles', 'edit roles']);
        $this->command->info('Roles and Permissions granted to Role Manager');

        // create Role Admin with default permissions
        $adminrole = Role::create(['name' => 'Role Admin']);
        $adminrole->givePermissionTo(['view roles', 'viewAny roles', 'create roles', 'edit roles', 'delete roles']);
        $this->command->info('Roles and Permissions granted to Role Admin');

        // create Permission User with default permissions
        $userPermission = Role::create(['name' => 'Permission User']);
        $userPermission->givePermissionTo(['view permissions', 'viewAny permissions', 'create permissions']);
        $this->command->info('Roles and Permissions granted to Permission User');

        // create Permission Manager Permission with default permissions
        $managerPermission = Role::create(['name' => 'Permission Manager']);
        $managerPermission->givePermissionTo(['view permissions', 'viewAny permissions', 'create permissions', 'edit permissions']);
        $this->command->info('Roles and Permissions granted to Permission Manager');

        // create Permission Admin with default permissions
        $adminPermission = Role::create(['name' => 'Permission Admin']);
        $adminPermission->givePermissionTo(['view permissions', 'viewAny permissions', 'create permissions', 'edit permissions', 'delete permissions']);
        $this->command->info('Roles and Permissions granted to Permission Admin');

        // create Workflow User with default permissions
        $userrole = Role::create(['name' => 'Workflow User']);
        $userrole->givePermissionTo(['view workflows', 'viewAny workflows', 'create workflows']);
        $this->command->info('Roles and Permissions granted to Workflow User');

        // create Workflow Manager role with default permissions
        $managerrole = Role::create(['name' => 'Workflow Manager']);
        $managerrole->givePermissionTo(['view workflows', 'viewAny workflows', 'create workflows', 'edit workflows']);
        $this->command->info('Roles and Permissions granted to User Manager');

        // create Workflow Admin with default permissions
        $adminrole = Role::create(['name' => 'Workflow Admin']);
        $adminrole->givePermissionTo(['view workflows', 'viewAny workflows', 'create workflows', 'edit workflows', 'delete workflows']);
        $this->command->info('Roles and Permissions granted to Workflow Admin');

        // create Billing User with default permissions
        $userrole = Role::create(['name' => 'Billing User']);
        $userrole->givePermissionTo(['view billings', 'viewAny billings', 'create billings']);
        $this->command->info('Roles and Permissions granted to Billing User');

        // create Billing Manager role with default permissions
        $managerrole = Role::create(['name' => 'Billing Manager']);
        $managerrole->givePermissionTo(['view billings', 'viewAny billings', 'create billings', 'edit billings']);
        $this->command->info('Roles and Permissions granted to Billing Manager');

        // create Billing Admin with default permissions
        $adminrole = Role::create(['name' => 'Billing Admin']);
        $adminrole->givePermissionTo(['view billings', 'viewAny billings', 'create billings', 'edit billings', 'delete billings']);
        $this->command->info('Roles and Permissions granted to Billing Admin');

        // create Category User with default permissions
        $userrole = Role::create(['name' => 'Category User']);
        $userrole->givePermissionTo(['view categories', 'viewAny categories', 'create categories']);
        $this->command->info('Roles and Permissions granted to Category User');

        // create Category Manager role with default permissions
        $managerrole = Role::create(['name' => 'Category Manager']);
        $managerrole->givePermissionTo(['view categories', 'viewAny categories', 'create categories', 'edit categories']);
        $this->command->info('Roles and Permissions granted to Category Manager');

        // create Category Admin with default permissions
        $adminrole = Role::create(['name' => 'Category Admin']);
        $adminrole->givePermissionTo(['view categories', 'viewAny categories', 'create categories', 'edit categories', 'delete categories']);
        $this->command->info('Roles and Permissions granted to Category Admin');

        // create Doctor Master User with default permissions
        $userrole = Role::create(['name' => 'Doctor Master User']);
        $userrole->givePermissionTo(['view doctor_masters', 'viewAny doctor_masters', 'create doctor_masters']);
        $this->command->info('Roles and Permissions granted to Doctor Master User');

        // create Doctor Master Manager role with default permissions
        $managerrole = Role::create(['name' => 'Doctor Master Manager']);
        $managerrole->givePermissionTo(['view doctor_masters', 'viewAny doctor_masters', 'create doctor_masters', 'edit doctor_masters']);
        $this->command->info('Roles and Permissions granted to Doctor Master Manager');

        // create Doctor Master Admin with default permissions
        $adminrole = Role::create(['name' => 'Doctor Master Admin']);
        $adminrole->givePermissionTo(['view doctor_masters', 'viewAny doctor_masters', 'create doctor_masters', 'edit doctor_masters', 'delete doctor_masters']);
        $this->command->info('Roles and Permissions granted to Doctor Master Admin');

        // create Head Quarter User with default permissions
        $userrole = Role::create(['name' => 'Head Quarter User']);
        $userrole->givePermissionTo(['view head_quarters', 'viewAny head_quarters', 'create head_quarters']);
        $this->command->info('Roles and Permissions granted to Head Quarter User');

        // create Head Quarter Manager role with default permissions
        $managerrole = Role::create(['name' => 'Head Quarter Manager']);
        $managerrole->givePermissionTo(['view head_quarters', 'viewAny head_quarters', 'create head_quarters', 'edit head_quarters']);
        $this->command->info('Roles and Permissions granted to Head Quarter Manager');

        // create Head Quarter Admin with default permissions
        $adminrole = Role::create(['name' => 'Head Quarter Admin']);
        $adminrole->givePermissionTo(['view head_quarters', 'viewAny head_quarters', 'create head_quarters', 'edit head_quarters', 'delete head_quarters']);
        $this->command->info('Roles and Permissions granted to Head Quarter Admin');

        // create Item Type User with default permissions
        $userrole = Role::create(['name' => 'Item Type User']);
        $userrole->givePermissionTo(['view item_types', 'viewAny item_types', 'create item_types']);
        $this->command->info('Roles and Permissions granted to Item Type User');

        // create Item Type Manager role with default permissions
        $managerrole = Role::create(['name' => 'Item Type Manager']);
        $managerrole->givePermissionTo(['view item_types', 'viewAny item_types', 'create item_types', 'edit item_types']);
        $this->command->info('Roles and Permissions granted to Item Type Manager');

        // create Item Type Admin with default permissions
        $adminrole = Role::create(['name' => 'Item Type Admin']);
        $adminrole->givePermissionTo(['view item_types', 'viewAny item_types', 'create item_types', 'edit item_types', 'delete item_types']);
        $this->command->info('Roles and Permissions granted to Item Type Admin');

        // create Patch User with default permissions
        $userrole = Role::create(['name' => 'Patch User']);
        $userrole->givePermissionTo(['view patches', 'viewAny patches', 'create patches']);
        $this->command->info('Roles and Permissions granted to Patch User');

        // create Patch Manager role with default permissions
        $managerrole = Role::create(['name' => 'Patch Manager']);
        $managerrole->givePermissionTo(['view patches', 'viewAny patches', 'create patches', 'edit patches']);
        $this->command->info('Roles and Permissions granted to Patch Manager');

        // create Patch Admin with default permissions
        $adminrole = Role::create(['name' => 'Patch Admin']);
        $adminrole->givePermissionTo(['view patches', 'viewAny patches', 'create patches', 'edit patches', 'delete patches']);
        $this->command->info('Roles and Permissions granted to Patch Admin');

        // create Product Master User with default permissions
        $userrole = Role::create(['name' => 'Product Master User']);
        $userrole->givePermissionTo(['view product_masters', 'viewAny product_masters', 'create product_masters']);
        $this->command->info('Roles and Permissions granted to Product Master User');

        // create Product Master Manager role with default permissions
        $managerrole = Role::create(['name' => 'Product Master Manager']);
        $managerrole->givePermissionTo(['view product_masters', 'viewAny product_masters', 'create product_masters', 'edit product_masters']);
        $this->command->info('Roles and Permissions granted to Product Master Manager');

        // create Product Master Admin with default permissions
        $adminrole = Role::create(['name' => 'Product Master Admin']);
        $adminrole->givePermissionTo(['view product_masters', 'viewAny product_masters', 'create product_masters', 'edit product_masters', 'delete product_masters']);
        $this->command->info('Roles and Permissions granted to Product Master Admin');

        // create Product User with default permissions
        $userrole = Role::create(['name' => 'Product User']);
        $userrole->givePermissionTo(['view products', 'viewAny products', 'create products']);
        $this->command->info('Roles and Permissions granted to Product User');

        // create Product Manager role with default permissions
        $managerrole = Role::create(['name' => 'Product Manager']);
        $managerrole->givePermissionTo(['view products', 'viewAny products', 'create products', 'edit products']);
        $this->command->info('Roles and Permissions granted to Product Manager');

        // create Product Admin with default permissions
        $adminrole = Role::create(['name' => 'Product Admin']);
        $adminrole->givePermissionTo(['view products', 'viewAny products', 'create products', 'edit products', 'delete products']);
        $this->command->info('Roles and Permissions granted to Product Admin');

        // create Product Sale User with default permissions
        $userrole = Role::create(['name' => 'Product Sale User']);
        $userrole->givePermissionTo(['view product_sales', 'viewAny product_sales', 'create product_sales']);
        $this->command->info('Roles and Permissions granted to Product Sale User');

        // create Product Sale Manager role with default permissions
        $managerrole = Role::create(['name' => 'Product Sale Manager']);
        $managerrole->givePermissionTo(['view product_sales', 'viewAny product_sales', 'create product_sales', 'edit product_sales']);
        $this->command->info('Roles and Permissions granted to Product Sale Manager');

        // create Product Sale Admin with default permissions
        $adminrole = Role::create(['name' => 'Product Sale Admin']);
        $adminrole->givePermissionTo(['view product_sales', 'viewAny product_sales', 'create product_sales', 'edit product_sales', 'delete product_sales']);
        $this->command->info('Roles and Permissions granted to Product Sale Admin');

        // create Sales Manager User with default permissions
        $userrole = Role::create(['name' => 'Sales Manager User']);
        $userrole->givePermissionTo(['view sales_managers', 'viewAny sales_managers', 'create sales_managers']);
        $this->command->info('Roles and Permissions granted to Sales Manager User');

        // create Sales Manager Manager role with default permissions
        $managerrole = Role::create(['name' => 'Sales Manager Manager']);
        $managerrole->givePermissionTo(['view sales_managers', 'viewAny sales_managers', 'create sales_managers', 'edit sales_managers']);
        $this->command->info('Roles and Permissions granted to Sales Manager Manager');

        // create Sales Manager Admin with default permissions
        $adminrole = Role::create(['name' => 'Sales Manager Admin']);
        $adminrole->givePermissionTo(['view sales_managers', 'viewAny sales_managers', 'create sales_managers', 'edit sales_managers', 'delete sales_managers']);
        $this->command->info('Roles and Permissions granted to Sales Manager Admin');

        // create State User with default permissions
        $userrole = Role::create(['name' => 'State User']);
        $userrole->givePermissionTo(['view states', 'viewAny states', 'create states']);
        $this->command->info('Roles and Permissions granted to State User');

        // create State Manager role with default permissions
        $managerrole = Role::create(['name' => 'State Manager']);
        $managerrole->givePermissionTo(['view states', 'viewAny states', 'create states', 'edit states']);
        $this->command->info('Roles and Permissions granted to State Manager');

        // create State Admin with default permissions
        $adminrole = Role::create(['name' => 'State Admin']);
        $adminrole->givePermissionTo(['view states', 'viewAny states', 'create states', 'edit states', 'delete states']);
        $this->command->info('Roles and Permissions granted to State Admin');

        // create Stockist User with default permissions
        $userrole = Role::create(['name' => 'Stockist User']);
        $userrole->givePermissionTo(['view stockists', 'viewAny stockists', 'create stockists']);
        $this->command->info('Roles and Permissions granted to Stockist User');

        // create Stockist Manager role with default permissions
        $managerrole = Role::create(['name' => 'Stockist Manager']);
        $managerrole->givePermissionTo(['view stockists', 'viewAny stockists', 'create stockists', 'edit stockists']);
        $this->command->info('Roles and Permissions granted to Stockist Manager');

        // create Stockist Admin with default permissions
        $adminrole = Role::create(['name' => 'Stockist Admin']);
        $adminrole->givePermissionTo(['view stockists', 'viewAny stockists', 'create stockists', 'edit stockists', 'delete stockists']);
        $this->command->info('Roles and Permissions granted to Stockist Admin');

        // create Free Unit User with default permissions
        $userrole = Role::create(['name' => 'Free Unit User']);
        $userrole->givePermissionTo(['view free_units', 'viewAny free_units', 'create free_units']);
        $this->command->info('Roles and Permissions granted to Free Unit User');

        // create Free Unit Manager role with default permissions
        $managerrole = Role::create(['name' => 'Free Unit Manager']);
        $managerrole->givePermissionTo(['view free_units', 'viewAny free_units', 'create free_units', 'edit free_units']);
        $this->command->info('Roles and Permissions granted to Free Unit Manager');

        // create Free Unit Admin with default permissions
        $adminrole = Role::create(['name' => 'Free Unit Admin']);
        $adminrole->givePermissionTo(['view free_units', 'viewAny free_units', 'create free_units', 'edit free_units', 'delete free_units']);
        $this->command->info('Roles and Permissions granted to Free Unit Admin');

        // create Area Manager User with default permissions
        $userrole = Role::create(['name' => 'Area Manager User']);
        $userrole->givePermissionTo(['view area_managers', 'viewAny area_managers', 'create area_managers']);
        $this->command->info('Roles and Permissions granted to Area Manager User');

        // create Area Manager Manager role with default permissions
        $managerrole = Role::create(['name' => 'Area Manager Manager']);
        $managerrole->givePermissionTo(['view area_managers', 'viewAny area_managers', 'create area_managers', 'edit area_managers']);
        $this->command->info('Roles and Permissions granted to Area Manager Manager');

        // create Area Manager Admin with default permissions
        $adminrole = Role::create(['name' => 'Area Manager Admin']);
        $adminrole->givePermissionTo(['view area_managers', 'viewAny area_managers', 'create area_managers', 'edit area_managers', 'delete area_managers']);
        $this->command->info('Roles and Permissions granted to Area Manager Admin');

        // create Specialist User with default permissions
        $userrole = Role::create(['name' => 'Specialist User']);
        $userrole->givePermissionTo(['view specialists', 'viewAny specialists', 'create specialists']);
        $this->command->info('Roles and Permissions granted to Specialist User');

        // create Specialist Manager role with default permissions
        $managerrole = Role::create(['name' => 'Specialist Manager']);
        $managerrole->givePermissionTo(['view specialists', 'viewAny specialists', 'create specialists', 'edit specialists']);
        $this->command->info('Roles and Permissions granted to Specialist Manager');

        // create Specialist Admin with default permissions
        $adminrole = Role::create(['name' => 'Specialist Admin']);
        $adminrole->givePermissionTo(['view specialists', 'viewAny specialists', 'create specialists', 'edit specialists', 'delete specialists']);
        $this->command->info('Roles and Permissions granted to Specialist Admin');

        // create Distribution Method User with default permissions
        $userrole = Role::create(['name' => 'Distribution Method User']);
        $userrole->givePermissionTo(['view distribution_methods', 'viewAny distribution_methods', 'create distribution_methods']);
        $this->command->info('Roles and Permissions granted to Distribution Method User');

        // create Distribution Method Manager role with default permissions
        $managerrole = Role::create(['name' => 'Distribution Method Manager']);
        $managerrole->givePermissionTo(['view distribution_methods', 'viewAny distribution_methods', 'create distribution_methods', 'edit distribution_methods']);
        $this->command->info('Roles and Permissions granted to Distribution Method Manager');

        // create Distribution Method Admin with default permissions
        $adminrole = Role::create(['name' => 'Distribution Method Admin']);
        $adminrole->givePermissionTo(['view distribution_methods', 'viewAny distribution_methods', 'create distribution_methods', 'edit distribution_methods', 'delete distribution_methods']);
        $this->command->info('Roles and Permissions granted to Distribution Method Admin');

        // create Prescription User with default permissions
        $userrole = Role::create(['name' => 'Prescription User']);
        $userrole->givePermissionTo(['view prescriptions', 'viewAny prescriptions', 'create prescriptions']);
        $this->command->info('Roles and Permissions granted to Prescription User');

        // create Prescription Manager role with default permissions
        $managerrole = Role::create(['name' => 'Prescription Manager']);
        $managerrole->givePermissionTo(['view prescriptions', 'viewAny prescriptions', 'create prescriptions', 'edit prescriptions']);
        $this->command->info('Roles and Permissions granted to Prescription Manager');

        // create Prescription Admin with default permissions
        $adminrole = Role::create(['name' => 'Prescription Admin']);
        $adminrole->givePermissionTo(['view prescriptions', 'viewAny prescriptions', 'create prescriptions', 'edit prescriptions', 'delete prescriptions']);
        $this->command->info('Roles and Permissions granted to Prescription Admin');

        // create Product Target User with default permissions
        $userrole = Role::create(['name' => 'Product Target User']);
        $userrole->givePermissionTo(['view product_targets', 'viewAny product_targets', 'create product_targets']);
        $this->command->info('Roles and Permissions granted to Product Target User');

        // create Product Target Manager role with default permissions
        $managerrole = Role::create(['name' => 'Product Target Manager']);
        $managerrole->givePermissionTo(['view product_targets', 'viewAny product_targets', 'create product_targets', 'edit product_targets']);
        $this->command->info('Roles and Permissions granted to Product Target Manager');

        // create Product Target Admin with default permissions
        $adminrole = Role::create(['name' => 'Product Target Admin']);
        $adminrole->givePermissionTo(['view product_targets', 'viewAny product_targets', 'create product_targets', 'edit product_targets', 'delete product_targets']);
        $this->command->info('Roles and Permissions granted to Product Target Admin');

        // create Sales Manager Target User with default permissions
        $userrole = Role::create(['name' => 'Sales Manager Target User']);
        $userrole->givePermissionTo(['view sales_manager_targets', 'viewAny sales_manager_targets', 'create sales_manager_targets']);
        $this->command->info('Roles and Permissions granted to Sales Manager Target User');

        // create Sales Manager Target Manager role with default permissions
        $managerrole = Role::create(['name' => 'Sales Manager Target Manager']);
        $managerrole->givePermissionTo(['view sales_manager_targets', 'viewAny sales_manager_targets', 'create sales_manager_targets', 'edit sales_manager_targets']);
        $this->command->info('Roles and Permissions granted to Sales Manager Target Manager');

        // create Sales Manager Target Admin with default permissions
        $adminrole = Role::create(['name' => 'Sales Manager Target Admin']);
        $adminrole->givePermissionTo(['view sales_manager_targets', 'viewAny sales_manager_targets', 'create sales_manager_targets', 'edit sales_manager_targets', 'delete sales_manager_targets']);
        $this->command->info('Roles and Permissions granted to Sales Manager Target Admin');

        // User Role
        $user_role = Role::create(['name' => 'User']);

        // Grant Super Admin rights to SUPER_ADMIN_EMAIL
        $adminEmail = env('SUPER_ADMIN_EMAIL', null);
        if (is_null($adminEmail)) {
            throw new \InvalidArgumentException('SUPER_ADMIN_EMAIL cannot be empty!');
        }

        $user = User::whereEmail($adminEmail)->first();

        if (is_null($user)) {
            throw new \InvalidArgumentException('User cannot be empty!');
        }

        $role = Role::create(['name' => 'Super Admin']);
        $user->assignRole('Super Admin');
        $this->command->info('Super Admin Role created successfully.');
    }
}
