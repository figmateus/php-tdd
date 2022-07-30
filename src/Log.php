<?php

namespace Code;

class Log
{
    public function log($message)
    {
        // classe de log que vai simplesmente salvar uma mensagem em algum arquivo.
        return 'Logando dados no sistema:' . $message;
    }
}