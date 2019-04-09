<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pedido Entity
 *
 * @property int $id
 * @property string $endereco
 * @property string $cidade
 * @property string $celular
 * @property \Cake\I18n\FrozenTime $data_retirada
 * @property string $observacao
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $usuario_id
 * @property int $materiai_id
 * @property int $recicladora_id
 *
 * @property \App\Model\Entity\Usuario $usuario
 * @property \App\Model\Entity\Materiai $materiai
 * @property \App\Model\Entity\Recicladora $recicladora
 */
class Pedido extends Entity
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
        'endereco' => true,
        'cidade' => true,
        'celular' => true,
        'data_retirada' => true,
        'observacao' => true,
        'created' => true,
        'modified' => true,
        'usuario_id' => true,
        'materiai_id' => true,
        'recicladora_id' => true,
        'usuario' => true,
        'materiai' => true,
        'recicladora' => true
    ];
}
