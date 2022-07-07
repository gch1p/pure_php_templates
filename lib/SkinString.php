<?php

class SkinString implements Stringable {

    protected SkinStringModificationType $modType;

    public function __construct(protected string $string) {}

    public function setModType(SkinStringModificationType $modType) {
        $this->modType = $modType;
    }

    public function __toString(): string {
        return match ($this->modType) {
            SkinStringModificationType::HTML => htmlspecialchars($this->string, ENT_QUOTES, 'UTF-8'),
            SkinStringModificationType::URL => urlencode($this->string),
            default => $this->string,
        };
    }

}