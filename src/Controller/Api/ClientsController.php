<?php
namespace App\Controller\Api;

use Cake\Event\Event;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Utility\Security;
use Firebase\JWT\JWT;

class ClientsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['add', 'token']);
    }


/*ENREGISTREMENT NOUVELLE UTILISATEUR*/
    public function add()
{
    $this->Crud->on('afterSave', function(Event $event) {
        if ($event->subject->created) {
            $this->set('data', [
                'id' => $event->subject->entity->id,
                'token' => JWT::encode(
                    [
                        'sub' => $event->subject->entity->id,
                        'exp' =>  time() + 604800
                    ],
                Security::salt())
            ]);
            $this->Crud->action()->config('serialize.data', 'data');
        }
    });
    return $this->Crud->execute();
}
/*ENREGISTREMENT NOUVELLE UTILISATEUR*/


/*DEMANDE DE CONNEXION*/
public function token()
{
    $user  = $this->Auth->identify();
    if (!$user) {
        throw new UnauthorizedException('Mot de passe ou pseudo invalide');
    }

    $this->set([
        'success' => true,
        'data' => [
          'id' => $user['id'],
            'token' => JWT::encode([
                'sub' => $user['id'],
                'exp' =>  time() + 604800
            ],
            Security::salt())
        ],
        '_serialize' => ['success', 'data']
    ]);
}
/*DEMANDE DE CONNEXION*/




} /*FIN DE LA CLASS class ClientsController*/
