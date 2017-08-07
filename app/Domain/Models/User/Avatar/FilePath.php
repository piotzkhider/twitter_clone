<?php

namespace App\Domain\Models\User\Avatar;

class FilePath
{
    /**
     * @var string
     */
    private $value;

    /**
     * FilePath constructor.
     *
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * 公開する際のパスを生成する
     *
     * @return \App\Domain\Models\User\Avatar\FilePath
     */
    public function publish(): FilePath
    {
        $filePath = $this->isDefault() ? $this->value : $this->fromStoredToPublish();

        return new static($filePath);
    }

    /**
     * デフォルトアバターのファイルパスを返却する
     *
     * @return \App\Domain\Models\User\Avatar\FilePath
     */
    public static function default(): FilePath
    {
        return new static('images/no-thumb.png');
    }

    /**
     * 格納されているパスから公開するパスに変換する
     *
     * @return string
     */
    private function fromStoredToPublish(): string
    {
        return sprintf('storage/avatars/%s', $this->filename());
    }

    /**
     * デフォルトアバターのファイルパスかどうか
     *
     * @return bool
     */
    private function isDefault(): bool
    {
        return $this->value == self::default()->value;
    }

    /**
     * ファイル名を返却する
     *
     * @return string
     */
    private function filename(): string
    {
        return last(explode('/', $this->value));
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->value;
    }
}
