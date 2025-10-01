<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Nsw\Component\Pagination;

use Drupal\Core\Url;
use PreviousNext\Ds\Common\Atom as CommonAtoms;
use PreviousNext\Ds\Common\Component as CommonComponent;
use PreviousNext\Ds\Common\Component\Pagination\Pagination;

final class PaginationScenarios {

  final public static function pagination(): Pagination {
    $url = \Mockery::mock(Url::class);
    $url->expects('toString')->andReturn('http://example.com/');

    $previousIcon = CommonAtoms\Icon\Icon::create('keyboard_arrow_left');
    $nextIcon = CommonAtoms\Icon\Icon::create('keyboard_arrow_right');

    /** @var \PreviousNext\Ds\Common\Component\Pagination\Pagination $instance */
    $instance = Pagination::create(
    // @todo there should be some kind of helper to make this easier:
      previous: CommonAtoms\Link\Link::create('', $url, iconStart: $previousIcon),
      next: CommonAtoms\Link\Link::create('', $url, iconEnd: $nextIcon),
    );

    // @todo there should be some kind of helper to make this easier:
    $instance[] = CommonComponent\Pagination\PaginationItem\PaginationItem::create(link: CommonAtoms\Link\Link::create('1', $url));
    $instance[] = $page2 = CommonComponent\Pagination\PaginationItem\PaginationItem::create(link: CommonAtoms\Link\Link::create('2', $url));
    $instance[] = CommonComponent\Pagination\PaginationItem\PaginationItem::create(ellipsis: TRUE);
    $instance[] = CommonComponent\Pagination\PaginationItem\PaginationItem::create(link: CommonAtoms\Link\Link::create('99', $url));
    $instance[] = CommonComponent\Pagination\PaginationItem\PaginationItem::create(link: CommonAtoms\Link\Link::create('100', $url));
    $instance->setActivePage($page2);
    return $instance;
  }

}
