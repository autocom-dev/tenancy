<?php

namespace App\Models\User\Cadastro\Pessoa;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;
use Nicolaslopezj\Searchable\SearchableTrait;

class Pessoa extends Model
{
    use Notifiable;
    use Sortable;
    use SearchableTrait;

    /**
     * The name of the "created at" column.
     *
     * @var string
     */
    const CREATED_AT = 'criacaodata';

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = 'alteracaodata';

    protected $table = 'tbl_pessoa';
    protected $primaryKey = 'codigo';

    public $idUsuario = 'usuario';
    public $idUsuarioAtu = 'usuarioatu';

    protected $fillable = [
        'codigo', 'nomefantasia', 'razaosocial', 'ativo', 'tipopessoa', 'indfinal',
        'tipoinscr', 'inscrfederal', 'inscrestad', 'inscrmunic', 'cnae', 'codigoexterno',
        'comissao', 'tabelacomissao', 'contacorrente', 'diavencimento', 'limitecredito', 'irrf',
        'pis', 'cofins', 'csll', 'iss', 'issretido', 'inss', 'irpj', 'outrasretencoes',
        'regiao', 'classificacao', 'carteira', 'condicao_pagamento', 'planocontas_financeiro',
        'contrato', 'valorcontrato', 'tabelapreco', 'representante', 'cep', 'logradouro',
        'endereco', 'numero', 'complemento', 'bairro', 'cidade', 'estado', 'ddd1', 'fone1',
        'ddd2', 'fone2', 'ddd3', 'fone3', 'ddd4', 'fone4', 'email', 'contato', 'datanasc',
        'sexo', 'nomepai', 'nomemae', 'racacor', 'profissao', 'estadocivil', 'referencia',
        'obs', 'datainicioativ', 'databaixa', 'senhasefaz', 'senhaprefeitura', 'senhasimplesnacional',
        'inscrfederalsocio', 'senha', 'cliente', 'fornecedor', 'transportadora', 'funcionario',
        'proprietario', 'motorista', 'seguradora', 'vendedor', 'fabricante', 'operadorpdv',
        'supervisorpdv', 'rota', 'usuario', 'usuarioatu'
    ];

    public $sortable = ['codigo', 'nomefantasia', 'inscrfederal', 'tbl_cidade.nome'];

    protected $searchable = [
        'columns' => [
            'tbl_pessoa.codigo' => 10,
            'tbl_pessoa.nomefantasia' => 20,
            'tbl_pessoa.inscrfederal' => 10,
            'tbl_cidade.nome' => 10,
        ],
    ];

    public static function tipoInscricao()
    {
        return [1 => 'CPF', 2 => 'CNPJ', 3 => 'CEI', 4 => 'Outros'];
    }

    public static function tipoSexo()
    {
        return [0 => 'Masculino', 1 => 'Feminino', 3 => 'Não Informado'];
    }

    public static function tipoRacaCor()
    {
        return [0 => 'Amarela', 1 => 'Branca', 2 => 'Indígena', 3 => 'Parda', 4 => 'Preta'];
    }

    public static function tipoEstadoCivil()
    {
        return [0 => 'Casado(a)', 1 => 'Divorciado(a)', 2 => 'Separado(a)', 3 => 'Solteiro(a)', 4 => 'Viúvo(a)'];
    }
}
