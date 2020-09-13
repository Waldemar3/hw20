<?php

namespace App;

class Stringable
{
    protected String $value;

    public function __construct(String $value = '')
    {
        $this->value = (string) $value;
    }

    public function after($search)
    {
        return new static(Str::after($this->value, $search));
    }

    public function afterLast($search)
    {
        return new static(Str::afterLast($this->value, $search));
    }

    public function append(...$values)
    {
        return new static($this->value.implode('', $values));
    }

    public function basename($suffix = '')
    {
        return new static(basename($this->value, $suffix));
    }

    public function before($search)
    {
        return new static(Str::before($this->value, $search));
    }

    public function beforeLast($search)
    {
        return new static(Str::beforeLast($this->value, $search));
    }

    public function contains($needles)
    {
        return Str::contains($this->value, $needles);
    }

    public function containsAll(array $needles)
    {
        return Str::containsAll($this->value, $needles);
    }

    public function dirname($levels = 1)
    {
        return new static(dirname($this->value, $levels));
    }

    public function endsWith($needles)
    {
        return Str::endsWith($this->value, $needles);
    }

    public function exactly($value)
    {
        return $this->value === $value;
    }

    public function explode($delimiter, $limit = PHP_INT_MAX)
    {
        return explode($delimiter, $this->value, $limit);
    }

    public function finish($cap)
    {
        return new static(Str::finish($this->value, $cap));
    }

    public function isEmpty()
    {
        return $this->value === '';
    }

    public function isNotEmpty()
    {
        return ! $this->isEmpty();
    }

    public function kebab()
    {
        return new static(Str::kebab($this->value));
    }

    public function length($encoding = null)
    {
        return Str::length($this->value, $encoding);
    }

    public function limit($limit = 100, $end = '...')
    {
        return new static(Str::limit($this->value, $limit, $end));
    }

    public function lower()
    {
        return new static(Str::lower($this->value));
    }

    public function ltrim($characters = null)
    {
        return new static(ltrim(...array_merge([$this->value], func_get_args())));
    }

    public function prepend(...$values)
    {
        return new static(implode('', $values).$this->value);
    }

    public function replace($search, $replace)
    {
        return new static(str_replace($search, $replace, $this->value));
    }

    public function replaceArray($search, array $replace)
    {
        return new static(Str::replaceArray($search, $replace, $this->value));
    }

    public function replaceFirst($search, $replace)
    {
        return new static(Str::replaceFirst($search, $replace, $this->value));
    }

    public function replaceLast($search, $replace)
    {
        return new static(Str::replaceLast($search, $replace, $this->value));
    }

    public function rtrim($characters = null)
    {
        return new static(rtrim(...array_merge([$this->value], func_get_args())));
    }

    public function snake($delimiter = '_')
    {
        return new static(Str::snake($this->value, $delimiter));
    }

    public function start($prefix)
    {
        return new static(Str::start($this->value, $prefix));
    }

    public function startsWith($needles)
    {
        return Str::startsWith($this->value, $needles);
    }

    public function studly()
    {
        return new static(Str::studly($this->value));
    }

    public function substr($start, $length = null)
    {
        return new static(Str::substr($this->value, $start, $length));
    }
    public function title()
    {
        return new static(Str::title($this->value));
    }

    public function trim($characters = null)
    {
        return new static(trim(...array_merge([$this->value], func_get_args())));
    }

    public function ucfirst()
    {
        return new static(Str::ucfirst($this->value));
    }

    public function upper()
    {
        return new static(Str::upper($this->value));
    }

    public function when($value, $callback, $default = null)
    {
        if ($value) {
            return $callback($this, $value) ?: $this;
        } elseif ($default) {
            return $default($this, $value) ?: $this;
        }

        return $this;
    }

    public function whenEmpty($callback)
    {
        if ($this->isEmpty()) {
            $result = $callback($this);

            return is_null($result) ? $this : $result;
        }

        return $this;
    }

    public function words($words = 100, $end = '...')
    {
        return new static(Str::words($this->value, $words, $end));
    }
}