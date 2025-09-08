<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Properties;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $company = Company::firstOrCreate(['name' => 'Default Company']);

        $admin = User::firstOrCreate([
            'email' => 'admin@example.com',
        ], [
            'name' => 'Admin User',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'company_id' => $company->id,
        ]);

        $customer = User::firstOrCreate([
            'email' => 'customer@example.com',
        ], [
            'name' => 'Customer User',
            'password' => Hash::make('password'),
            'role' => 'user',
            'company_id' => $company->id,
        ]);

        Properties::firstOrCreate([
            'name' => 'Customer Asset',
            'company_id' => $company->id,
            'user_id' => $customer->id,
        ], [
            'realestate' => '1',
            'statusproperties' => '1',
            'cep' => '12345-678',
            'logradouro' => 'Rua Exemplo',
            'bairro' => 'Bairro Exemplo',
            'cidade' => 'Cidade Exemplo',
            'uf' => 'EX',
            'areatotal' => '100',
            'valorvenal' => '100000',
            'valordaaquisicao' => '90000',
            'dataaquisicao' => '2023-01-01',
            'construction' => '1',
        ]);
    }
}
