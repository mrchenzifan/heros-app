<?php
declare(strict_types=1);
namespace App\Util;

class BaseListVo
{
    private string $page  = "1";

    private string $pageSize = "10";

    /**
     * @return string
     */
    public function getPage(): string
    {
        return $this->page;
    }

    /**
     * @param string $page
     */
    public function setPage(string $page): void
    {
        $this->page = $page;
    }

    /**
     * @return string
     */
    public function getPageSize(): string
    {
        return $this->pageSize;
    }

    /**
     * @param string $pageSize
     */
    public function setPageSize(string $pageSize): void
    {
        $this->pageSize = $pageSize;
    }
}
