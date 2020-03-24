# formBuilder 
- this package create dynamic html form by chainig method 

# required
- laravel

# usage
the default class for all input[type=text] and select is form-control if added class remove default
 - ClassValidationRequest: set dynamic start if the first rules equal required
 - second parameter is bool :  if parameter equal true  , bind name input tag via validation.php file
 ```php
 $from = new FormBuilder(ClassValidationRequest::class,true);
 ````
 - startForm() and endForm() method
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
 - 
