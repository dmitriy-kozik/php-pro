<?php


interface Format
{
    public function format($string);
}
class FormatRaw implements Format
{
    public function format($string)
    {
        return $string;
    }
}
class FormatWithDate implements Format
{
    public function format($string)
    {
        return date('Y-m-d H:i:s') . $string;
    }
}
class FormatWithDateAndDetails implements Format
{
    public function format($string)
    {
        return date('Y-m-d H:i:s') . $string . ' - With some details';
    }
}


interface Deliver
{
    public function deliver($format);
}

class DeliverByEmail implements Deliver
{
    public function deliver($format)
    {
        echo "Вывод формата ({$format}) по имейл";
    }
}
class DeliverBySMS implements Deliver
{
    public function deliver($format)
    {
        echo "Вывод формата ({$format}) в смс";
    }
}
class DeliverToConsole implements Deliver
{
    public function deliver($format)
    {
        echo "Вывод формата ({$format}) в консоль";
    }
}


class Logger
{
    public function __construct(protected Format $format, protected Deliver $deliver)
    {
    }

    public function log($string)
    {
        $this->deliver->deliver($this->format->format($string));
    }
}
$logger = new Logger(new FormatRaw(), new DeliverBySMS());
$logger->log('Emergency error! Please fix me!');

