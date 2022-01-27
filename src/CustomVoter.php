<?php

namespace App;



namespace App;

    use App\Entity\Schtroumpf;
    use App\Entity\SchtroumpfJob;
    use App\Entity\User;
    use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

    use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class CustomVoter extends Voter
{
    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token): bool
    {

        $user = $token->getUser();

        if (!$user instanceof User) {
            // the user must be logged in; if not, deny access
            return false;
        }


        /** @var Schtroumpf $schtroumpf */
        $schtroumpf = $subject;

        foreach ($schtroumpf->getSchtroumpfJobs() as $value) {
            /** @var SchtroumpfJob $job */
            $job = $value;
            if ($job . $user == $user) {
                return true;
            }
        }
        return false;

    }

    protected function supports(string $attribute, mixed $subject): bool
    {

        // if the attribute isn't one we support, return false
        if (!in_array($attribute, ["contains_sch"])) {
            return false;
        }


        // only vote on `Post` objects
        if (!$subject instanceof Schtroumpf) {
            return false;
        }
        return true;

    }
}

