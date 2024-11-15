import { TmpUserSessionType, UserSessionType } from "./types";

export let UserSession:UserSessionType | null = null;
export const setUserSession = (data:UserSessionType | null) => {
  UserSession = data;
}

export let TmpUserSession:TmpUserSessionType | null = null;
export const setTmpUserSession = (data:TmpUserSessionType) => {
  TmpUserSession = data;
}