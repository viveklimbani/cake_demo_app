<?php

namespace App\Controller;

use App\Controller\AppController;

class TopicsController extends AppController
{

      	public function initialize()
      	{	
      		parent::initialize();
      		$this->loadComponent('Flash'); // Include the FlashComponent
        }
        public function index()
        {
          $this->set('topics', $this->Topics->find('all'));
        }

        public function view($id)
        {
          $topic = $this->Topics->get($id);
          $this->set(compact('topic'));
        }

        public function add()
        {
          $topic = $this->Topics->newEntity();
          if ($this->request->is('post'))
          {
            if(!empty($this->request->data['image_path']['name']))
            {   
              $file=$this->request->data['image_path']['name'];
              $filename = pathinfo($file, PATHINFO_FILENAME);
              $file_ext = pathinfo($file, PATHINFO_EXTENSION);
              $file_new = $filename.time().'.'.$file_ext;
              $arr_ext = array('jpg', 'jpeg', 'gif'); //set allowed extensions
              if(move_uploaded_file($this->request->data['image_path']['tmp_name'], WWW_ROOT . 'uploads/' .$file_new))
              {
                $this->request->data['image'] = $file_new;
              }
              else
              {
                $file=$this->request->data['image_path']['name'];
              }
              $cbox = $this->request->data;
              $this->request->data['hobby'] = implode(',' , $cbox['hobby']);
              $topic = $this->Topics->patchEntity($topic, $this->request->data);
              if ($this->Topics->save($topic))
              {
                $this->Flash->success(__('Your topic has been saved.'));
                return $this->redirect(['action' => 'index']);
              }
              $this->Flash->error(__('Unable to add your topic.'));
            }
          $this->set('topic', $topic);
          }
        }

        public function edit($id = null)
        {
          $topic = $this->Topics->get($id);
          if ($this->request->is(['post', 'put']))
          {
           $cbox = $this->request->data;
           $this->request->data['hobby'] = implode(',',$cbox['hobby']);
           $this->Topics->patchEntity($topic, $this->request->data);
            if ($this->Topics->save($topic))
            {
             $this->Flash->success(__('Your topic has been updated.'));
             return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update your topic.'));
          }
            $this->set('topic', $topic);
        }
        
        public function delete($id)
        {
          $this->request->allowMethod(['post', 'delete']);
          $topic = $this->Topics->get($id);
          if ($this->Topics->delete($topic))
          {
           $this->Flash->success(__('The topic with id: {0} has been deleted.', h($id)));
           return $this->redirect(['action' => 'index']);
          }
        }
}

?>