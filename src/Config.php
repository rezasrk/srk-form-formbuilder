<?php
namespace SrkForm\FormBuilder;

class Config
{
    protected $form;


    protected $colMd = [
        1 => 'col-md-1',2 => 'col-md-2',3 => 'col-md-3',4 => 'col-md-4',5 => 'col-md-5',6 => 'col-md-6',
        7 => 'col-md-7',8 => 'col-md-8',9 => 'col-md-9',10 => 'col-md-10',11 => 'col-md-11',12 => 'col-md-12',
    ];

    protected $colSm = [
        1 => 'col-sm-1',2 => 'col-sm-2',3 => 'col-sm-3',4 => 'col-sm-4',5 => 'col-sm-5',6 => 'col-sm-6',
        7 => 'col-sm-7',8 => 'col-sm-8',9 => 'col-sm-9',10 => 'col-sm-10',11 => 'col-sm-11',12 => 'col-sm-12',
    ];

    protected $colXs = [
        1 => 'col-xs-1',2 => 'col-xs-2',3 => 'col-xs-3',4 => 'col-xs-4',5 => 'col-xs-5',6 => 'col-xs-6',
        7 => 'col-xs-7',8 => 'col-xs-8',9 => 'col-xs-9',10 => 'col-xs-10',11 => 'col-xs-11',12 => 'col-xs-12',
    ];

    protected $colLg = [
        1 => 'col-lg-1',2 => 'col-lg-2',3 => 'col-lg-3',4 => 'col-lg-4',5 => 'col-lg-5',6 => 'col-lg-6',
        7 => 'col-lg-7',8 => 'col-lg-8',9 => 'col-lg-9',10 => 'col-lg-10',11 => 'col-lg-11',12 => 'col-lg-12',
    ];

    protected $withCol = [
        'sm','md','xs','lg'
    ];


    protected $withListAttr = [
        'class', 'id', 'action', 'method', 'enctype', 'name', 'value','rows','multiple','type'
    ];

    protected $labels;
}
