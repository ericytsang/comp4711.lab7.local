<?php

/**
 * This is a "CMS" model for quotes, but with bogus hard-coded data.
 * This would be considered a "mock database" model.
 *
 * @author jim
 */
class Menu extends CI_Model
{
    /**
     * the root menu node in menu.xml.
     */
    protected $xml = null;

    /**
     * array of patty menu details, indexed by their codes.
     */
    protected $patties = array();

    /**
     * array of cheese menu details, indexed by their codes.
     */
    protected $cheeses = array();

    /**
     * array of topping menu details, indexed by their codes.
     */
    protected $toppings = array();

    /**
     * array of sauce menu details, indexed by their codes.
     */
    protected $sauces = array();

    /**
     * loads the menu SimpleXMLElement into memory.
     */
    public function __construct()
    {
        parent::__construct();

        // parse menu.xml
        $this->xml = simplexml_load_file(DATAPATH.'menu.xml');

        // build a full list of patties
        foreach ($this->xml->patties->patty as $patty)
        {
            $record = new stdClass();
            $record->code = (string) $patty['code'];
            $record->name = (string) $patty;
            $record->price = (float) $patty['price'];
            $this->patties[$record->code] = $record;
        }

        // build a full list of cheeses
        foreach ($this->xml->cheeses->cheese as $cheese)
        {
            $record = new stdClass();
            $record->code = (string) $cheese['code'];
            $record->name = (string) $cheese;
            $record->price = (float) $cheese['price'];
            $this->cheeses[$record->code] = $record;
        }

        // build a full list of toppings
        foreach ($this->xml->toppings->topping as $topping)
        {
            $record = new stdClass();
            $record->code = (string) $topping['code'];
            $record->name = (string) $topping;
            $record->price = (float) $topping['price'];
            $this->toppings[$record->code] = $record;
        }

        // build a full list of sauces
        foreach ($this->xml->sauces->sauce as $sauce)
        {
            $record = new stdClass();
            $record->code = (string) $sauce['code'];
            $record->name = (string) $sauce;
            $record->price = (float) $sauce['price'];
            $this->sauces[$record->code] = $record;
        }
    }

    /**
     * retrieves the menu details of a patty that has corresponds to $code.
     *
     * @param  {string} $code code used to indicate which menu item to retrieve.
     *
     * @return a standard object that has menu details of a patty that has
     *   corresponds to $code.
     */
    public function get_patty($code)
    {
        if (isset($this->patties[$code]))
            return $this->patties[$code];
        else
            return null;
    }

    /**
     * retrieves the menu details of a cheese that has corresponds to $code.
     *
     * @param  {string} $code code used to indicate which menu item to retrieve.
     *
     * @return a standard object that has menu details of a cheese that has
     *   corresponds to $code.
     */
    public function get_cheese($code)
    {
        if (isset($this->cheeses[$code]))
            return $this->cheeses[$code];
        else
            return null;
    }

    /**
     * retrieves the menu details of a topping that has corresponds to $code.
     *
     * @param  {string} $code code used to indicate which menu item to retrieve.
     *
     * @return a standard object that has menu details of a topping that has
     *   corresponds to $code.
     */
    public function get_topping($code)
    {
        if (isset($this->toppings[$code]))
            return $this->toppings[$code];
        else
            return null;
    }

    /**
     * retrieves the menu details of a sauce that has corresponds to $code.
     *
     * @param  {string} $code code used to indicate which menu item to retrieve.
     *
     * @return a standard object that has menu details of a sauce that has
     *   corresponds to $code.
     */
    public function get_sauce($code)
    {
        if (isset($this->sauces[$code]))
            return $this->sauces[$code];
        else
            return null;
    }
}
