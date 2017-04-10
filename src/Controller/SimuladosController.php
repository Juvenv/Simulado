<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Simulados Controller
 *
 * @property \App\Model\Table\SimuladosTable $Simulados
 */
class SimuladosController extends AppController
{

	public function initialize(){
		parent::initialize();
		
		$this->viewBuilder()->setLayout('defaultclient');
	}
	
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
    	
    }

    public function simulado(){
    	TableRegistry::get('Tags');
    	$questoes = TableRegistry::get('Questions');
    	$questoes = $questoes->find()->select(
    			['id']);
    	$questoesArray = $questoes->toArray();
    	$idsQuestoes = [];
    	$quantidadeQuestoes = 10;
    	 
    	if(count(count($questoesArray) < $quantidadeQuestoes)){
    		$quantidadeQuestoes = count($questoesArray);
    	}
    	 
    	$indices = array_rand($questoesArray, $quantidadeQuestoes);
    	foreach ($indices as $indice){
    		$idsQuestoes[] = $questoesArray[$indice]->id;
    	}
    	 
    	$questoes = $questoes->select(['id', 'content'])->where(['id IN' => $idsQuestoes]);
    	$questoes = $questoes->contain(['Alternatives', 'Tags']);
    	 
    	
    	return $this->response->withStringBody(json_encode($questoes));
    }
}
