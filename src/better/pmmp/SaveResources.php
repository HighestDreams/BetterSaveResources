<?php

declare(strict_types=1);

namespace better\pmmp;

use pocketmine\utils\AssumptionFailedError;
use Webmozart\PathUtil\Path;

trait SaveResources
{
    public function saveResource(string $filename, bool $replace = false, string $toPath = ''): bool
    {
        if(empty(trim($filename))) return false;

        if(is_null($resource = $this->getResource($filename))) return false;

        $path = empty($toPath) ? $this->getDataFolder() : $toPath;
        $out = Path::join($path, $filename);
        if(!file_exists(dirname($out))){
            mkdir(dirname($out), 0755, true);
        }

        if(file_exists($out) && !$replace) return false;


        $fp = fopen($out, "wb");
        if($fp === false) throw new AssumptionFailedError("fopen() should not fail with wb flags");

        $ret = stream_copy_to_stream($resource, $fp) > 0;
        fclose($fp);
        fclose($resource);
        return $ret;
    }
}
