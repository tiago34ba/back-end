<?php
class PaginationType
{
  public function args() : array
  {
    return [
      'id' => [
        'name' => 'id',
        'type' => Type::id(),
      ],
      'ids' => [
        'name' => 'ids',
        'type' => Type::listOf(Type::id()),
      ],
            // take, page のパラメータを追加
      'take' => [
        'type' => Type::int(),
      ],
      'page' => [
        'type' => Type::int(),
      ],
    ];
  }
}