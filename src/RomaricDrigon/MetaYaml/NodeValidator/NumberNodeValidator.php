<?php

namespace RomaricDrigon\MetaYaml\NodeValidator;

use RomaricDrigon\MetaYaml\Exception\NodeValidatorException;

class NumberNodeValidator extends NodeValidator
{
    public function validate($name, $node_config, $data)
    {
        if ($this->checkRequired($name, $node_config, $data)) return true;

        $strict = isset($node_config['_metadata']['_strict']) && isset($node_config['_metadata']['_strict']);

        if (! is_numeric($data) || ($strict && ! (is_integer($data) || is_float($data)))) {
            throw new NodeValidatorException($name, sprintf('The node "%s" is not numeric', 
                $name));
        }

        return true;
    }
}