<?php

namespace UYCore\Security;

final class SecurityService
{
    public function disableXmlRpc(): self
    {
        XmlRpc::disable();

        return $this;
    }

    public function secureApiByAuth(): self
    {
        ApiProtection::protectAllEndpointsByAuth();

        return $this;
    }

    public function secureAll(): void
    {
        $this->disableXmlRpc();
        $this->secureApiByAuth();
    }
}