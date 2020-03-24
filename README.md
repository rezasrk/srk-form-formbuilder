# formBuilder 
- this package create dynamic html form by chainig method 

# required
- laravel

# usage
 - startForm and endForm method
```php
$from = new FormBuilder(ClassValidationRequest::class,true);

  $form = $form->startForm(route('test'),['method'=>'get'])->endForm();
 
 ```
 
 -  top code result
 ```html
<form action="/test" method="get"></form>
```
