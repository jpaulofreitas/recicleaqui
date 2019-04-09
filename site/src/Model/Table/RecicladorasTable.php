<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Recicladoras Model
 *
 * @property \App\Model\Table\UsuariosTable|\Cake\ORM\Association\BelongsTo $Usuarios
 * @property \App\Model\Table\MateriaisTable|\Cake\ORM\Association\BelongsTo $Materiais
 * @property \App\Model\Table\PedidosTable|\Cake\ORM\Association\HasMany $Pedidos
 *
 * @method \App\Model\Entity\Recicladora get($primaryKey, $options = [])
 * @method \App\Model\Entity\Recicladora newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Recicladora[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Recicladora|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Recicladora patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Recicladora[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Recicladora findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RecicladorasTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('recicladoras');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Usuarios', [
            'foreignKey' => 'usuario_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Materiais', [
            'foreignKey' => 'materiai_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Pedidos', [
            'foreignKey' => 'recicladora_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create')
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('razao_social')
            ->maxLength('razao_social', 45)
            ->allowEmpty('razao_social');

        $validator
            ->scalar('cnpj')
            ->maxLength('cnpj', 18)
            ->allowEmpty('cnpj')
            ->add('cnpj', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('telefone')
            ->maxLength('telefone', 14)
            ->allowEmpty('telefone');

        $validator
            ->scalar('celular')
            ->maxLength('celular', 15)
            ->allowEmpty('celular');

        $validator
            ->scalar('endereco')
            ->maxLength('endereco', 60)
            ->allowEmpty('endereco');

        $validator
            ->scalar('cidade')
            ->maxLength('cidade', 45)
            ->allowEmpty('cidade');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['id']));
        $rules->add($rules->isUnique(['cnpj']));
        $rules->add($rules->existsIn(['usuario_id'], 'Usuarios'));
        $rules->add($rules->existsIn(['materiai_id'], 'Materiais'));

        return $rules;
    }
}
