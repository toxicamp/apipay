<?php
/**
 *
 * @author Nico Litvynchuk litvynchuk.m@gmail.com
 * Created: 02.05.2020
 */
namespace App\Core\Error;

interface IError {
   function build(string $code, string $message, Regex $regex, array $field_code) : IError;
   function toArray(): array;
}
