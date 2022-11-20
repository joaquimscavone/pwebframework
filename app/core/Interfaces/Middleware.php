<?php

namespace Core\Interfaces;

interface Middleware{
    /**
     * Verifica se a condição do middle é verdadeira ou falsa
     * @return bool
     */
    public function check(): bool;

    /**
     * Executa procedimento em middle falso;
     * @return void
     */
    public function handle();
}