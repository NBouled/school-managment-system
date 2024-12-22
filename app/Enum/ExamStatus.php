<?php

namespace App\Enum;

enum ExamStatus: string
{
    case DRAFT = 'draft';
    case PUBLISHED = 'published';
    case FINISHED = 'finished';

}
