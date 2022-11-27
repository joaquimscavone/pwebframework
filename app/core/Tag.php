<?php

namespace Core;

use Core\Interfaces\ViewElement;

class Tag implements ViewElement
{


    private $tagname;
    const VOID_ELEMENTS = array(
        "area", "base", "br", "col", "embed", "hr", "img", "input", "keygen", "link",
        "meta", "param", "source", "track", "wbr"
    );
    private $children = array();
    private $properties = array();
    private $void;
    private $parent;

    private $linebreak = '';
    private $tab = '';
    public function __construct($tagname)
    {
        $this->tagname = $tagname;
        $this->void = in_array($this->tagname, self::VOID_ELEMENTS);
        if (APPLICATION_ENV == 'development') {
            $this->linebreak = "\n";
            $this->tab = "\t";
        }
    }


    public function add($element)
    {
        if ($this->void) {
            throw new \Exception('Elementos Void não podem ter filhos!');
        }
        if (!is_array($element)) {
            $element = [$element];
        }
        foreach ($element as $item) {
            $this->children[] = $item;
            if ($item instanceof Tag) {
                $item->parent = $this;
                $item->tab .= $this->tab;
            }
        }

        return $this;
    }

    public function parentNode()
    {
        return $this->parent;
    }

    public function __set($name, $value)
    {
        $this->properties[$name] = $value;
    }

    public function __get($name)
    {
        return (array_key_exists($name, $this->properties))
            ? $this->properties[$name] : "";
    }

    private function renderProperties()
    {
        $prop = "";
        foreach ($this->properties as $key => $property) {
            $prop .= " {$key}='$property'";
        }
        return $prop;
    }


    public function show()
    {
        $lb_tab = $this->linebreak . $this->tab;
        $lb_internal_tab = (empty($lb_tab)) ? "" : $lb_tab . "\t";
        if ($this->void) {
            echo "{$lb_tab}<{$this->tagname}{$this->renderProperties()}/>";
            return;
        }
        echo "{$lb_tab}<{$this->tagname}{$this->renderProperties()}>";
        foreach ($this->children as $child) {
            if ($child instanceof ViewElement) {
                $child->show();
                continue;
            }
            echo $lb_internal_tab . $child;
        }
        echo "{$lb_tab}</{$this->tagname}>";
    }

    public function isVoid()
    {
        return $this->void;
    }

    public static function create($tag, $class = "", $content = "")
    {
        $tag = new Tag($tag);
        if (!empty($class)) {
            $tag->class = $class;
        }
        if (!empty($content)) {
            $tag->add($content);
        }
        return $tag;
    }
}
