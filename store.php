<?php
Class Store
{
    private $items;
    private $productsString;
    //public static $storeObj; Factory Design Pattern


    private function __construct(){
        $this->items = array('A' => 2,'B' => 12,'C' => 1.25,'D' => 0.15, 'specialA'=>'7','specialC'=>'6');
    }

    public static function createInstance(){
        // self::storeObj = new Store();
        return new Store();
    }

    private function scan($item)
    {
        return substr_count($this->productsString, $item);
    }

    private function calcSingleItemPrice($itemCount, $key)
    {
        return $itemCount*$this->items[$key];
    }

    public function calculatePrice($products)
    {
        $this->productsString = $products;
        $price = 0;
        $countItems = array();
        $countItems['A'] = $this->scan('A');
        $countItems['B'] = $this->scan('B');
        $countItems['C'] = $this->scan('C');
        $countItems['D'] = $this->scan('D');

        foreach($countItems as $key=>$value){
            if($countItems[$key] != 0){
                if($key == 'A'){
                    if($countItems[$key] >= 4){
                        $specialA = intval($countItems[$key] / 4);
                        $normalA = $countItems[$key] % 4;
                        $price += $specialA * $this->items['specialA'];
                        $price += $this->calcSingleItemPrice($normalA, $key);
                    }else{
                        $price += $this->calcSingleItemPrice($countItems[$key], $key);       
                    }
                }elseif($key == 'C'){
                    if($countItems[$key] >= 6){
                        $specialC = intval($countItems[$key] / 6);
                        $normalC = $countItems[$key] % 6;
                        $price += $specialC * $this->items['specialC'];
                        $price += $this->calcSingleItemPrice($normalC, $key);
                    }else{
                        $price += $this->calcSingleItemPrice($countItems[$key], $key);
                    }

                }else{
                        $price += $this->calcSingleItemPrice($countItems[$key], $key);
                }
                
            }
        }
        return number_format($price, 2);
        
    }
}
?>