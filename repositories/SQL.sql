USE [PILOTDB]
GO

/****** Object:  UserDefinedFunction [dbo].[CelsuisToFahrenheit]    Script Date: 2/26/2024 9:08:34 AM ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE FUNCTION [dbo].[CelsuisToFahrenheit] (@temperature FLOAT)
RETURNS FLOAT
AS
BEGIN
	DECLARE @newTemperature FLOAT

	SET @newTemperature = (@temperature * 1.8)+32
	RETURN @newTemperature
END
GO


