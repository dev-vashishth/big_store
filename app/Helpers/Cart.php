<?php
namespace App\Helpers;
 
// use Illuminate\Support\Facades\DB;
 
class Cart {

    /**
	 * This method adds items into cart.
     * @param array $items
     * 
     * @return 
     */
    public static function add_to_cart($item) 
    {

        $products = (session()->get('cart')) ? array_values(session()->get('cart')) : [];
        $product = array_search($item['id'], array_column($products, 'id'));
        
        if ($product!==false)
        {
            $products[$product]['quantity'] += 1;
            return session()->put('cart', $products);           
        }
        else
        {
            return session()->push('cart', $item);  
        }

        // print_r(session()->get('cart'));
    }

    /**
     * This method updates  cart.
     * @param int $id
     * 
     * @return 
     */
    public static function update_cart($items)
    {
        return session()->put('cart', $items); 
    }

    /**
	 * This method removes specific item from cart.
     * @param int $id
     * 
     * @return 
     */
    public static function remove_from_cart($id)
    {
        $products = (session()->get('cart')) ? array_values(session()->get('cart')) : [];
        $product = array_search($id, array_column($products, 'id'));
        
        if ($product !==false) 
        {
           unset($products[$product]);
        }

        session()->put('cart', $products);
    }

    /**
	 * This method removes all items from cart.
     * 
     * @return 
     */
    public static function empty_cart()
    {
       return session()->pull('cart');
    }

    /**
	 * This method gets all items of cart.
     * @param 
     * 
     * @return 
     */
    public static function get_cart()
    {
        return session()->get('cart');
    }


}