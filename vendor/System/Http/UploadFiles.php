<?php 

namespace System\Http;

use System\Application;

class UploadFiles
{
	/**
	 * Application object
	 *
	 * @var \System\Application
	 */
	private $app;

	/**
	 * The upload file 
	 *
	 * @var array
	 */
	private $file = [];

	/**
	 * Upload file name (with extension)
	 *
	 * @var string
	 */
	private $fileName;

	/**
	 * Upload file name (without extension)
	 *
	 * @var string
	 */
	private $nameOnly;

	/**
	 * Upload file extension
	 *
	 * @var string
	 */
	private $extension;

	/**
	 * Upload file mime type
	 *
	 * @var string
	 */
	private $mimeType;

	/**
	 * Upload temp file
	 *
	 * @var string
	 */
	private $tempFile;

	/**
	 * Upload file size in bytes
	 *
	 * @var int
	 */
	private $size;

	/**
	 * Upload file error
	 *
	 * @var int
	 */
	private $error;

	/**
	 * The allowed image extension
	 * 
	 * @var array
	 */
	private $allowedImageExtension = ['gif', 'jpg', 'jpeg', 'png', 'webp'];

	/**
	 * Constructor
	 *
	 * @param \System\Application $app
	 * @param string $input
	 */
	public function __construct($input)
	{
		//$this->app = $app;
		$this->getFileInfo($input);
	}

	/**
	 * Start collecting uploading file info
	 *
	 * @param string $input
	 * @return void
	 */
	private function getFileInfo($input)
	{
		if (empty($_FILES[$input])) { return; }
		
		$file = $_FILES[$input];
		$this->error = $file['error'];

		if ($this->error != UPLOAD_ERR_OK) {
			return;
		}
		$this->file = $file;
		$this->fileName = $this->file['name'];
		$fileNameInfo = pathinfo($this->fileName);

		$this->nameOnly = $fileNameInfo['filename'];
		$this->extension = strtolower($fileNameInfo['extension']);

		$this->mimeType = $this->file['type'];
		$this->tempFile = $this->file['tmp_name'];
		$this->size = $this->file['size'];
	}

	/**
	 * Chech if the file id uploaded already
	 *
	 * @return bool
	 */
	public function isUploaded()
	{
		return ! empty($this->file);
	}

	/**
	 * Get file name 
	 *
	 * @return string
	 */
	public function getFileName()
	{
		return $this->fileName;
	}

	/**
	 * Get file name only without extension
	 * 
	 * @return string
	 */
	public function getNameOnly()
	{
		return $this->nameOnly;
	}

	/**
	 * Get file extension
	 * 
	 * @return string
	 */
	public function getExtension()
	{
		return $this->extension;
	}

	/**
	 * Get file mime type
	 * 
	 * @return string
	 */
	public function getMineType()
	{
		return $this->mimeType;
	}

	/**
	 * Check if the uploaded file is image
	 * 
	 * @return bool
	 */
	public function isImage()
	{
		return strpos($this->mimeType, 'image/') === 0 && in_array($this->extension, $this->allowedImageExtension);
	}

	/**
	 * Move the uploaded file to the given directory (target)
	 *
	 * @param string $target
     * @param string $newFileName
	 * @return string
	 */
	public function moveTo($target, $newFileName = null)
	{
		$fileName = $newFileName ?: sha1(mt_rand()) . '_' . sha1(mt_rand()); // total length = 81 char
		$fileName .= '.' . $this->extension;

		if (! is_dir($target)) {
			mkdir($target, 0777, true);
		}
		$uploadedFilePath = rtrim($target, '/') . '/' . $fileName;

		move_uploaded_file($this->tempFile, $uploadedFilePath);
		
		return $fileName;
	}
}