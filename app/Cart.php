<?php

namespace App;

class Cart
{
	public $items = null;
	public $itemPrice = 0;
	public $totalQty = 0;

	public function __construct($oldCart){
		if($oldCart){
			$this->items = $oldCart->items;
			$this->itemPrice = $oldCart->itemPrice;
			$this->totalQty = $oldCart->totalQty;
		}
	}


	public function add($item){
        // $name = 'name';
        $id = $item->cart_id;
        $amount = $item->cart_amount;
        $itemPrice = $item->itemPrice;
        
        // dd($amount);
        $giohang = ['qty'=>0, 'id' => $id];
        if($this->items){
            if(array_key_exists($id, $this->items)){
                $giohang = $this->items[$id];
            }
        }
        $giohang['qty'] += $amount;
        $this->totalQty += $amount;
        $this->itemPrice = $itemPrice;
        $this->items[$id] = $giohang;
    }

	// Xóa Sản Phẩm
	public function removeItem($id, $amount){
		// dd($this->items[$id]);
		$this->totalQty -= $amount;
		// dd($this->totalQty);
		// $this->totalQty -= $this->items[$id]['qty'];
		// $this->totalPrice -= $this->items[$id]['price'];
		unset($this->items[$id]);
	}

	// Cập Nhật Sản Phẩm
	public function UpdateAmount($id, $amount){
		// dd($this->items[$id]);
		$this->totalQty += $amount;
		$this->items[$id]['qty'] += $amount;
		// dd($this->totalQty);
		// $this->totalQty -= $this->items[$id]['qty'];
		// $this->totalPrice -= $this->items[$id]['price'];
		// unset($this->items[$id]);
	}
}
