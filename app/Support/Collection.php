<?php

namespace App\Support;
use IteratorAggregate;
use ArrayIterator;
use JsonSerializable;
class Collection implements IteratorAggregate,JsonSerializable
{
   protected $items=[];
   
    public function ToJSON():string
    {
       return json_encode($this->items);
       
    }
    public function jsonSerialize()
    {
       return $this->items;
    }
   public function merge(Collection $Collection):Collection
    {
       return new Collection(array_merge( $this->get(),$Collection->get()));
    }
    public function add(Collection $Collection):void
    {
      $this->items=array_merge( $this->get(),$Collection->get());
    }
    public function getIterator(array $items=[]):ArrayIterator
    {
       return new ArrayIterator( $this->items);
    }
    public function __construct(array $items=[])
    {
       $this->items=$items;
    }
    public function get():array
    {
       return  $this->items;
    }
    public function count():int
    {
       return  count($this->items);
    }
    
}