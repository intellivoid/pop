<?php


    namespace pop;

    /**
     * Class pop
     * @package pop
     */
    class pop
    {

        /**
         * Parse arguments
         *
         * @param array|string [$message] input arguments
         * @param int $max_arguments
         * @return array Configs Key/Value
         */
        public static function parse($message=null, $max_arguments=1000): array
        {
            if (is_string($message))
            {
                $argv = explode(' ', $message);
            }
            elseif(is_array($message))
            {
                $argv = $message;
            }
            else
            {
                global $argv;
                if(isset($argv) && count($argv) > 1)
                {
                    array_shift($argv);
                }
            }

            $index = 0;
            $configs = array();
            while ($index < $max_arguments && isset($argv[$index]))
            {
                if (preg_match('/^([^-\=]+.*)$/', $argv[$index], $matches) === 1)
                {
                    // not have ant -= prefix
                    $configs[$matches[1]] = true;
                }
                elseif(preg_match('/^-+(.+)$/', $argv[$index], $matches) === 1)
                {
                    // match prefix - with next parameter
                    if (preg_match('/^-+(.+)\=(.+)$/', $argv[$index], $subMatches) === 1)
                    {
                        $configs[$subMatches[1]] = $subMatches[2];
                    }
                    elseif(isset($argv[$index + 1]) && preg_match('/^[^-\=]+$/', $argv[$index + 1]) === 1)
                    {
                        // have sub parameter
                        $configs[$matches[1]] = $argv[$index + 1];
                        $index++;
                    }
                    elseif(strpos($matches[0], '--') === false)
                    {
                        for ($j = 0; $j < strlen($matches[1]); $j += 1)
                        {
                            $configs[$matches[1][$j]] = true;
                        }
                    }
                    elseif(isset($argv[$index + 1]) && preg_match('/^[^-].+$/', $argv[$index + 1]) === 1)
                    {
                        $configs[$matches[1]] = $argv[$index + 1];
                        $index++;
                    }
                    else
                    {
                        $configs[$matches[1]] = true;
                    }
                }
                $index++;
            }

            return $configs;
        }
    }