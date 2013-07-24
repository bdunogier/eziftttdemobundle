<?php
/**
 * File containing the Simple class.
 *
 * @copyright Copyright (C) 2013 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */ 
namespace BD\Bundle\EzIFTTTBundle\ContentProvider;

use BD\Bundle\EzIFTTTBundle\ContentProvider;
use BD\Bundle\IFTTTBundle\IFTTT\Request;
use BD\Bundle\EzIFTTTBundle\ContentProvider\Simple;

/**
 * Creates a folder out of a Request.
 *
 * - request::title is mapped to the folder's name
 * - request::description is mapped to the folder's short_description
 *   HTML tags are stripped from the description, and each line is placed in a paragraph.
 *
 */
class Demo extends Simple
{
    /** @var \eZ\Publish\API\Repository\Values\User\User */
    private $currentUser;

    public function setCurrentUser( \eZ\Publish\Api\Repository\Repository $repository )
    {
        $this->currentUser = $repository->getCurrentUser();
    }

    /**
     * The content is located below the Root folder.
     */
    public function newLocationCreateStructFromRequest( Request $request )
    {
        return $this->locationService->newLocationCreateStruct(
            $this->currentUser->contentInfo->mainLocationId
        );
    }
}
