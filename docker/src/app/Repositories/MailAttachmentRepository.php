<?php

namespace App\Repositories;

use App\Models\MailAttachment;

class MailAttachmentRepository implements MailAttachmentRepositoryInterface
{
    /**
     * @var MailAttachment
     */
    private $mailAttachment;

    public function __construct(MailAttachment $mailAttachment)
    {
        $this->mailAttachment = $mailAttachment;
    }

    /**
     * メール添付ファイル情報の保存
     *
     * @param array $putFileInfo
     * @return array $putFileInfo
     */
    public function saveFile($putFileInfo)
    {
        $fileInfo = $this->mailAttachment;
        $fileInfo->file_path = $putFileInfo['filePath'];
        $fileInfo->file_name = $putFileInfo['fileName'];
        $fileInfo->save();

        return $putFileInfo;
    }
}