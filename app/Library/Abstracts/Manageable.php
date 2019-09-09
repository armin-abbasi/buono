<?php


namespace App\Library\Abstracts;


interface Manageable
{
    /**
     * @return mixed
     */
    public function getAll();

    /**
     * @param array $input
     * @return mixed
     */
    public function create(array $input);

    /**
     * @param int $id
     * @return mixed
     */
    public function get(int $id);

    /**
     * @param int $id
     * @return mixed
     */
    public function delete(int $id);

    /**
     * @param int $id
     * @param array $input
     * @return mixed
     */
    public function update(int $id, array $input);
}