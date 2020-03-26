# formBuilder 
- this package create dynamic html form by chainig method 
<hr>
# required
- laravel >= 5
<hr>
# installation 
` composer require srk-form/formbuilder`
<hr>
# usage
for input[type=text] and select By default they have class form-control if class is added it will be deleted class form-control should be imported if needed

 - ClassValidationRequest: set dynamic start if the first rules equal required
 - The value of the second parameter is a boolean which is equal to the value if true and exist name input in validation.php
  bind instead label
 ```php
 $from = new FormBuilder(ClassValidationRequest::class,true);
 ````
 - startForm() and endForm() method action attribute by default is post
```php
  $form = $form->startForm(route('test'),['method'=>'get'])->endForm()
 ```
- text() method : the first paramete is array  key = arrtibute and value = attributes value
```php
 $form->text(['name'=>'fullName','class'=>'form-control','value'=>'']);
```

- checkbox() mthod like top method the second parameter is checked , default false 
```php
 $form->checkbox(['name'=>'football','value'=>'1'],true)
 ```
 - select() mthod like text() method but the second parameter get array for fill option  and third parameter selected if the select is multiple the thied paramater able get array for selected option 
 
 ```php
 $form->select(['name'=>'football'],['key'=>'value'],selected)
 ```
