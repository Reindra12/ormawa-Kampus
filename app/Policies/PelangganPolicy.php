<?php

namespace App\Policies;

use App\Models\Mahasiswa;
use App\Models\Pelanggan;
use Illuminate\Auth\Access\HandlesAuthorization;

class PelangganPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Mahasiswa $mahasiswa, Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Mahasiswa $mahasiswa, Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Mahasiswa $mahasiswa, Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Mahasiswa $mahasiswa, Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Mahasiswa $mahasiswa, Pelanggan $pelanggan)
    {
        //
    }
}
