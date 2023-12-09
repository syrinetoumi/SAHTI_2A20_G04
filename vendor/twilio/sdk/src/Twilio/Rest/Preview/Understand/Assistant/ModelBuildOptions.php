<?php
/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Preview
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Twilio\Rest\Preview\Understand\Assistant;

use Twilio\Options;
use Twilio\Values;

abstract class ModelBuildOptions
{
    /**
     * @param string $statusCallback 
     * @param string $uniqueName A user-provided string that uniquely identifies this resource as an alternative to the sid. Unique up to 64 characters long. For example: v0.1
     * @return CreateModelBuildOptions Options builder
     */
    public static function create(
        
        string $statusCallback = Values::NONE,
        string $uniqueName = Values::NONE

    ): CreateModelBuildOptions
    {
        return new CreateModelBuildOptions(
            $statusCallback,
            $uniqueName
        );
    }




    /**
     * @param string $uniqueName A user-provided string that uniquely identifies this resource as an alternative to the sid. Unique up to 64 characters long. For example: v0.1
     * @return UpdateModelBuildOptions Options builder
     */
    public static function update(
        
        string $uniqueName = Values::NONE

    ): UpdateModelBuildOptions
    {
        return new UpdateModelBuildOptions(
            $uniqueName
        );
    }

}

class CreateModelBuildOptions extends Options
    {
    /**
     * @param string $statusCallback 
     * @param string $uniqueName A user-provided string that uniquely identifies this resource as an alternative to the sid. Unique up to 64 characters long. For example: v0.1
     */
    public function __construct(
        
        string $statusCallback = Values::NONE,
        string $uniqueName = Values::NONE

    ) {
        $this->options['statusCallback'] = $statusCallback;
        $this->options['uniqueName'] = $uniqueName;
    }

    /**
     * 
     *
     * @param string $statusCallback 
     * @return $this Fluent Builder
     */
    public function setStatusCallback(string $statusCallback): self
    {
        $this->options['statusCallback'] = $statusCallback;
        return $this;
    }

    /**
     * A user-provided string that uniquely identifies this resource as an alternative to the sid. Unique up to 64 characters long. For example: v0.1
     *
     * @param string $uniqueName A user-provided string that uniquely identifies this resource as an alternative to the sid. Unique up to 64 characters long. For example: v0.1
     * @return $this Fluent Builder
     */
    public function setUniqueName(string $uniqueName): self
    {
        $this->options['uniqueName'] = $uniqueName;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        $options = \http_build_query(Values::of($this->options), '', ' ');
        return '[Twilio.Preview.Understand.CreateModelBuildOptions ' . $options . ']';
    }
}




class UpdateModelBuildOptions extends Options
    {
    /**
     * @param string $uniqueName A user-provided string that uniquely identifies this resource as an alternative to the sid. Unique up to 64 characters long. For example: v0.1
     */
    public function __construct(
        
        string $uniqueName = Values::NONE

    ) {
        $this->options['uniqueName'] = $uniqueName;
    }

    /**
     * A user-provided string that uniquely identifies this resource as an alternative to the sid. Unique up to 64 characters long. For example: v0.1
     *
     * @param string $uniqueName A user-provided string that uniquely identifies this resource as an alternative to the sid. Unique up to 64 characters long. For example: v0.1
     * @return $this Fluent Builder
     */
    public function setUniqueName(string $uniqueName): self
    {
        $this->options['uniqueName'] = $uniqueName;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        $options = \http_build_query(Values::of($this->options), '', ' ');
        return '[Twilio.Preview.Understand.UpdateModelBuildOptions ' . $options . ']';
    }
}
