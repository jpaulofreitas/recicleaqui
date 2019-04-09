<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Recicladora Entity
 *
 * @property int $id
 * @property string $razao_social
 * @property string $cnpj
 * @property string $telefone
 * @property string $celular
 * @property string $endereco
 * @property string $cidade
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $usuario_id
 * @property int $materiai_id
 *
 * @property \App\Model\Entity\Usuario $usuario
 * @property \App\Model\Entity\Materiai $materiai
 * @property \App\Model\Entity\Pedido[] $pedidos
 */
class Recicladora extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'razao_social' => true,
        'cnpj' => true,
        'telefone' => true,
        'celular' => true,
        'endereco' => true,
        'cidade' => true,
        'created' => true,
        'modified' => true,
        'usuario_id' => true,
        'materiai_id' => true,
        'usuario' => true,
        'materiai' => true,
        'pedidos' => true
    ];
}
