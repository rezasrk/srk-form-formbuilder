# formBuilder 
- this package create dynamic html form by chainig method 

# required
- laravel

# example

```php
$from = new FormBuilder(ClassValidationRequest::class,true);

  $form = $form->startRow()
            ->select(['name' => 'fsb_type', 'class' => 'form-control typeBase'], ['section' => 'بخش', 'axis' => 'محور', 'challenge' => 'چالش'], isset($festival_base->fsb_type) ? $festival_base->fsb_type : '')
            ->text(['name' => 'fsb_title', 'value' => isset($festival_base->fsb_title) ? $festival_base->fsb_title : ''])
            ->select(['star' => 'true', 'name' => 'axises', 'class' => 'form-control hiddenAxis'], $axis, isset($festival_base->fsb_parent_id) ? $festival_base->fsb_parent_id : '')
            ->endRow()
            ->startRow()
            ->select(['star' => 'true', 'name' => 'fsb_grade_ids[]', 'multiple' => 'multiple', 'class' => 'form-control select2 hiddenGrade', 'width' => '12', 'style' => 'width:100%'], $grade, isset($festival_base->fsb_valid_grade_ids) ? json_decode($festival_base->fsb_valid_grade_ids) : '')
            ->endRow()
            ->startRow()
            ->button(['class' => 'btn btn-success storeAjax'])
            ->endRow()
            ->endForm();
```
