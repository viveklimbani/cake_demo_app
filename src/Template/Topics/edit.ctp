<h1>Edit Topic</h1>
<?php
echo $this->Form->create($topic);
echo $this->Form->input('fname');
echo $this->Form->input('email');
echo $this->Form->input('password');
echo $this->Form->label('Country');
echo $this->Form->select('country', [
	''  	=> '',
	'India' => 'India',
	'USA '  => 'USA',
	'Japan' => 'Japan',
	'China' => 'China',      
]);	
echo $this->Form->label('Gender');
echo $this->Form->radio('gender', ['Male' => 'Male','Female' => 'Female']);
echo $hobby = $this->Form->input('hobby', array(
	'type'		=>'select',
	'label'		=>'Hobby',
	'multiple'	=>'checkbox',
	'options'	=>array('Reading'=>'Reading','Playing'=>'Playing','Travelling'=>'Travelling'),
));
echo $this->Form->input('image_path', [
	'label' => 'Image',
	'type' 	=> 'file' 
]);
echo $this->Form->button(__('Save Topic'));
echo $this->Form->end();
?>