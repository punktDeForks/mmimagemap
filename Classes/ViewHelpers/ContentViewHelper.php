<?php
namespace MikelMade\Mmimagemap\ViewHelpers;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;

/**
 * (c) 2019 MMichael Perlbach
 */


class ContentViewHelper extends \TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper
{
		// output html since TYPO3 8LTS
		protected $escapeOutput = false;

		/**
		 * register the content element uid
		 */
		public function initializeArguments()
		{
			parent::initializeArguments();
			$this->registerArgument('uid', 'int', 'The uid of the plugin content', true);
		}

		/**
		 * Parse content element
		 *
		 * @return	 string	parsed content element
		 */
		public function render()
		{
			$uid = (int)$this->arguments['uid'];
			$conf = array(
				'tables' => 'tt_content',
				'source' => $uid,
				'dontCheckPid' => 1
			);

			$objectManager = GeneralUtility::makeInstance(ObjectManager::class);

			return $objectManager->get('TYPO3\CMS\Frontend\ContentObject\RecordsContentObject')->render($conf);
		}
}
