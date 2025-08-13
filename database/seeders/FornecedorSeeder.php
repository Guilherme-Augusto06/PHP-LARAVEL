<?php

namespace Database\Seeders;

use Database\Factories\FornecedorFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Fornecedor;
class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        $fornecedor = new Fornecedor();
//        $fornecedor->nome = 'Fornecedor 1';
//        $fornecedor->site = 'www.fornecedor1.com.br';
//        $fornecedor->uf = 'SP';
//        $fornecedor->email = 'teste@teste.com';
//        $fornecedor->regiao = 'Sudeste';
//        $fornecedor->save();

        Fornecedor::factory()->count(10)->create();
    }
}
