<?php
namespace App\Repositories;

abstract class AbstractRepository
{
    /**
     * Hold current model from child class construct
     * @var Eqluent Model
     */
    protected $model;

    /**
     * hold Input::all
     * @var
     */
    protected $formInput;

    /**
     * Hold current modify model object
     * @var
     */
    protected $object;

    /**
     * get the current modify object
     * @return mixed
     */
    public function getObject()
    {
        return $this->object;
    }


    /**
     * Set the current modify object
     * @param $inputData
     * @return $this
     */
    public function setObject($inputData)
    {
        $this->object = $inputData;
        return $this;
    }

    /**
     * get the  Model object
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * construct form input modification
     * @return mixed
     */
    public function getFormInput()
    {
        return $this->formInput;
    }

    /**
     * get the form input
     * @param array $formInput
     * @return $this
     */
    public function setFormInput(array $formInput)
    {
        $this->formInput = $formInput;
        return $this;
    }

    /**
     * Model create object wrapper
     * @return $this
     */
    public function create()
    {
        $object = $this->model->create($this->getFormInput());
        $this->setObject($object);
        return $this;
    }

    /**
     * Update the current object
     * @param $object
     * @return $this
     */
    public function update($object)
    {
        $object->update($this->getFormInput());
        $this->setObject($object);
        return $this;
    }

    /**
     * model get by id
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * model delete by id
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->model->delete($id);
    }


    /**
     * model delete by id
     * @param
     * @return mixed
     */
    public function lists()
    {
        return $this->model->all();
    }

}
