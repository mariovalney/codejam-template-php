<?php

/**
 * Google Codejam Template PHP
 *
 * Developer: Mário Valney
 * URL: mariovalney.com
 *
 * How to use: Copy this file to a directory with any-thing.in and run to write a output.out file
 * By CLI: php -f source.php
 * By Browser: put in a web server (apache/other) and call in your browser (uncomment echoes to see)
 */

class CJ_Source {

    /**
     * The array of values to be tested
     */
    private $input = array();

    /**
     * The array of values to be printed
     */
    private $output = array();

    /**
     * The array of erros to be printed
     */
    private $errors = array();

    /**
     * First action is read the file
     */
    public function __construct() {
        $this->readFile();
        $this->run();
        $this->writeFile();
    }

    /**
     * First action is read the file
     */
    private function readFile() {
        $files = glob( '*.in' );
        if ( ! empty( $files ) ) {
            $this->input = file( $files[0], FILE_IGNORE_NEW_LINES );
        } else {
            $this->errors[] = 'Error: A anything.in file is missing in the source directory';
        }
    }

    /**
     * After code let's write the file
     */
    private function writeFile() {
        if ( empty( $this->output ) ) {
            $this->errors[] = 'Error: None output';
        }

        $stream = '';
        if ( ! empty( $this->errors ) ) {
            foreach ( $this->errors as $line ) {
                $stream .= $line . PHP_EOL;
            }
        } else {
            foreach ( $this->output as $line ) {
                $stream .= $line . PHP_EOL;
            }
        }

        // echo $stream;
        file_put_contents( 'output.out', $stream );
    }

    /**
     * Check for input and run your script
     */
    private function run() {
        if ( empty( $this->input ) ) {
            $this->errors[] = 'Error: None input';
        } else if ( (int) array_shift( $this->input ) !== count( $this->input ) ) {
            $this->errors[] = 'Error: Input header (first line) is wrong';
        } else {
            $this->code();
        }
    }

    /**
     * Run the code!
     * You can edit from here (creating new methods below if necessary)
     */
    private function code() {
        foreach ($this->input as $key => $input) {
            $case = $key + 1;

            // Magic starts here:
            $answer = $input;

            $this->output[] = "Case #$case: $answer";
        }
    }
}

//  Doing stuff
new CJ_Source();