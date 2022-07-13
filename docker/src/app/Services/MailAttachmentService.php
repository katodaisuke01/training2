<?php

namespace App\Services;

use App\Repositories\MailAttachmentRepositoryInterface as MailAttachmentRepository;
use Illuminate\Support\Facades\Storage;

class MailAttachmentService
{
    /**
     * @var MailAttachmentRepositoryInterface
     */
    private $mailAttachmentRepository;

    public function __construct(MailAttachmentRepository $mailAttachmentRepository)
    {
        $this->mailAttachmentRepository = $mailAttachmentRepository;
    }

    /**
     * メール添付ファイルのアップロード
     *
     * @param [type] $file
     * @return void
     */
    public function saveFile($file)
    {
        $fileName = $file->getClientOriginalName();
        $filePath = Storage::putFile('/mail_attachments', $file);

        $putFileInfo = [
            'fileName' => $fileName,
            'filePath' => $filePath
        ];

        return $this->mailAttachmentRepository->saveFile($putFileInfo);
    }
}