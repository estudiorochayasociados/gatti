<?php

namespace Clases;

class Hubspot
{

    //Atributos
    public $vid;
    public $nombre;
    public $apellido;
    public $email;
    public $telefono;
    public $celular;
    public $direccion;
    public $localidad;
    public $provincia;
    public $postal;
    public $pais;

    public $publicFunction;

    //Metodos
    public function __construct()
    {
        $this->publicFunction= new PublicFunction();
    }

    public function set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    public function get($atributo)
    {
        return $this->$atributo;
    }

    public function addContact(){
        $url = 'https://api.hubapi.com/contacts/v1/contact?hapikey=' . HUBKEY;
        $data_ = array(
            'properties' => array(
                array(
                    'property' => 'email',
                    'value' => $this->email
                ),
                array(
                    'property' => 'firstname',
                    'value' => $this->nombre
                ),
                array(
                    'property' => 'lastname',
                    'value' => $this->apellido
                ),
                array(
                    'property' => 'phone',
                    'value' => $this->telefono
                ),
                array(
                    'property' => 'mobilephone',
                    'value' => $this->celular
                ),
                array(
                    'property' => 'country',
                    'value' => $this->pais
                ),
                array(
                    'property' => 'state',
                    'value' => $this->provincia
                ),
                array(
                    'property' => 'city',
                    'value' => $this->localidad
                ),
                array(
                    'property' => 'address',
                    'value' => $this->direccion
                ),
                array(
                    'property' => 'zip',
                    'value' => $this->postal
                )
            )
        );
        $data = json_encode($data_);
        $response = $this->publicFunction->curl("POST", $url, $data);

        //Responses Types:
        //200:Success
        //400:Errors with the body
        //409:Email existing
        switch ($response) {
            case 200:
                return true;
                break;
            case 400:
                return "Los datos ingresados no son correctos";
                break;
            case 409:
                return "El email ya se encuentra en uso";
                break;
        }
    }

    public function updateContact(){
        $url = 'https://api.hubapi.com/contacts/v1/contact/vid/' . $this->vid . '/profile?hapikey=' . HUBKEY;
        echo $url;
        $data_ = array(
            'properties' => array(
                array(
                    'property' => 'email',
                    'value' => $this->email
                ),
                array(
                    'property' => 'firstname',
                    'value' => $this->nombre
                ),
                array(
                    'property' => 'lastname',
                    'value' => $this->apellido
                ),
                array(
                    'property' => 'phone',
                    'value' => $this->telefono
                ),
                array(
                    'property' => 'mobilephone',
                    'value' => $this->celular
                ),
                array(
                    'property' => 'country',
                    'value' => $this->pais
                ),
                array(
                    'property' => 'state',
                    'value' => $this->provincia
                ),
                array(
                    'property' => 'city',
                    'value' => $this->localidad
                ),
                array(
                    'property' => 'address',
                    'value' => $this->direccion
                ),
                array(
                    'property' => 'zip',
                    'value' => $this->postal
                )
            )
        );
        $data = json_encode($data_);
        $response = $this->publicFunction->curl("POST", $url, $data);

        //Responses Types:
        //204:Success/Updated
        //400:Error with body
        //401:Wrong API Key
        //404:Not Found with this vid
        //500:Internal server error
        switch ($response["Status"]){
            case 204:
                return true;
                break;
            case 400:
                return false;
                break;
            case 401:
                return false;
                break;
            case 404:
                return 404;
                break;
            case 500:
                return false;
                break;
        }
        var_dump($response['Status']);

    }

    public function getContactByEmail()
    {
        $url = 'https://api.hubapi.com/contacts/v1/contact/email/' . $this->email . '/profile?hapikey=' . HUBKEY;
        $response = $this->publicFunction->curl("", $url, '');
        $data = json_decode($response['Data'], true);

        //Responses Types:
        //200:Success
        //404:Email Not Found
        switch ($response['Status']){
            case 200:
                $data_=array(
                  "vid" => $data['vid'],
                  "nombre" => $data['properties']['firstname']['value'],
                  "apellido" => $data['properties']['lastname']['value'],
                  "email" => $data['properties']['email']['value'],
                  "telefono" => $data['properties']['phone']['value']
                );
                return $data_;
                break;
            case 400:
                return false;
                break;
        }
    }


}
